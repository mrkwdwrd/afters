<?php

namespace App\Http\Controllers\Admin;

use App\Models\CmsAccordion;
use App\Models\CmsGallery;
use App\Models\CmsPage;
use App\Models\CmsSlider;
use App\Http\Controllers\Controller;
use App\Libraries\Utils;
use App\Models\Tile;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Validator;

class CmsPageController extends Controller
{
    use FileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = CmsPage::where('parent_id', null)->orderBy('sort_order', 'ASC')->get();
        $all_pages = CmsPage::all();

        return view('admin.pages.index', compact('pages', 'all_pages'));
    }

    /**
     *  Create a new page
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'label'                       => 'required',
            'parent_id'                   => 'nullable'
        ]);

        if ($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator)->withInput();

        $parent = !empty($request->parent_id) ? CmsPage::where('id', $request->parent_id)->first() : null;
        $page = CmsPage::create([
            'parent_id' => !empty($request->parent_id) ? $request->parent_id : null,
            'title' => $request->label,
            'label' => $request->label,
            'sort_order' => CmsPage::where('parent_id', $request->parent_id)->max('sort_order') + 1
        ]);

        if ($parent)    //>1 level deep and the permalink screws up until after the page has been saved
            $page->update(['permalink' => $parent->permalink . '/' . $page->slug]);
        else
            $page->update(['permalink' => $page->slug]);

        return redirect()->route('admin.pages.edit', $page->id)->with('success', 'You have successfully created this page!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = CmsPage::where('id', $id)->first();
        $pages = CmsPage::where('id', '!=', $id)->get();
        $contentableTypes = Utils::getContentableTypes();

        $sliders = CmsSlider::all();
        $accordions = CmsAccordion::all();
        $galleries = CmsGallery::all();
        $tiles = Tile::all();

        return view('admin.pages.edit', compact(
            'page',
            'pages',
            'contentableTypes',
            'sliders',
            'accordions',
            'galleries',
            'tiles'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CmsPageRequest $request
     * @param int            $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'label'                       => 'required',
            'title'                       => 'required',
            'slug'                        => [
                'required',
                'alpha_dash',
                Rule::unique('cms_pages')->ignore($id, 'id')
            ],
            'parent_id'                   => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $parent = !empty($request->parent_id) ? CmsPage::where('id', $request->parent_id)->first() : null;
        $page = CmsPage::where('id', $id)->first();
        $page->update([
            'parent_id' => !empty($request->parent_id) ? $request->parent_id : null,
            'cms_slider_id' => !empty($request->cms_slider_id) ? $request->cms_slider_id : null,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'label' => $request->label,
            'slug' => $request->slug,
            'content' => $request->content,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'show_in_nav' => isset($request->show_in_nav),
            'show_in_footer' => isset($request->show_in_footer)
        ]);

        if ($parent)    //>1 level deep and the permalink screws up until after the page has been saved
            $page->update(['permalink' => $parent->permalink . '/' . $page->slug]);
        else
            $page->update(['permalink' => $page->slug]);

        foreach ($page->nodes as $node) {
            $node->update(['slug' => $request->cms_node_slug[$node->id]]);

            foreach ($node->nodeContents as $content) {
                if ($content->type === 'text') {
                    $content->contentable->title = $request->cms_content_title[$content->contentable->id];
                    $content->contentable->slug = $request->cms_content_slug[$content->contentable->type . '_' . $content->contentable->id];
                    $content->contentable->type = $request->cms_content_type[$content->contentable->id];

                    if ($content->contentable->type === 'image') {
                        if (isset($request->cms_content_image) && isset($request->cms_content_image[$content->contentable->id])) //Only update if we've actually selected an image
                        {
                            $image = $request->cms_content_image[$content->contentable->id];
                            $content->contentable->content = null;
                            $content->contentable->addMedia($image)->usingFileName($image->getClientOriginalName())->toMediaCollection('image');
                        }
                    } else {
                        $content->contentable->content = $request->{'cms_content_' . $content->contentable->type}[$content->contentable->id];
                    }
                } elseif ($content->type === 'tile_group') {
                    $tile_group = $request->cms_tile_group[$content->contentable->id];
                    $content->contentable->heading = $tile_group["heading"];
                    $content->contentable->style = $tile_group["style"];

                    $content->contentable->tiles()->detach();
                    if (isset($tile_group["tiles"]))
                    {
                        foreach ($tile_group["tiles"] as $row => $tiles)
                        {
                            foreach ($tiles as $column => $tiles_group)
                            {
                                foreach ($tiles_group as $index => $tile)
                                    $content->contentable->tiles()->attach([$tile => ["row_no" => $row + 1,
                                                                                        "column_no" => $column + 1,
                                                                                        "order" => $index + 1]]);
                            }
                        }
                    }
                }

                $content->contentable->update();
            }
        }

        return redirect()->route('admin.pages.edit', $page->id)->with('success', 'You have successfully updated this page!');
    }

    /**
     * Delete (soft) the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        CmsPage::where('id', $id)->update(['slug' => null, 'sort_order' => null]);
        CmsPage::where('id', $id)->delete();

        return redirect()->route('admin.pages.index')->with('success', 'You have successfully deleted this page!');
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        CmsPage::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.pages.index')->with('success', 'You have successfully restored this page!');
    }

    /**
     * Sort page order.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sortOrder(Request $request)
    {
        foreach ($request->order as $order => $page)
            CmsPage::where('id', $page)->update(['sort_order' => $order + 1]);

        return response()->json(['status' => 201, 'success' => 'You have successfully sorted these pages!'], 201);
    }

    /**
     * Add image
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addImage(Request $request, $id)
    {
        $page = CmsPage::where('id', $id)->first();

        $image = is_array($request->file('images')) ? $request->file('images')[0] : $request->file('images');

        $media = $page->addMedia($image)
            ->usingFileName($this->makeFilename($image))
            ->toMediaCollection('images', 'page');

        $view = view('admin.pages.partials._media', compact('media'))->render();

        return response()->json(['status' => 201, 'success' => 'You have successfully added this image!', 'view' => $view], 201);
    }

    /**
     * Delete image
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteImage(Request $request, $id, $image)
    {
        $page = CmsPage::where('id', $id)->first();

        $page->getMedia('images')->where('id', $image)->first()->delete();

        return response()->json(['status' => 200, 'success' => 'You have successfully deleted this image!'], 200);
    }
}
