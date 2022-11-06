<?php

namespace App\Http\Controllers\Admin;

use App\Models\CmsAccordion;
use App\Models\CmsContent;
use App\Models\CmsGallery;
use App\Models\CmsNode;
use App\Models\CmsNodeContent;
use App\Models\CmsPage;
use App\Models\CmsSlider;
use App\Models\CmsTileGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\Utils;
use App\Models\Tile;
use Illuminate\Support\Str;
use Validator;

class CmsNodeController extends Controller
{
    /**
     * Create a new node
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request, $id)
    {
        $cmsPage = CmsPage::where('id', $id)->first();
        $sliders = CmsSlider::all();
        $accordions = CmsAccordion::all();
        $galleries = CmsGallery::all();
        $tiles = Tile::all();

        $data = $request->all();
        $data['slug'] = $cmsPage->slug;

        $type = strtolower(Utils::getContentableTypes()[$data['contentable_type']]);

        if (!in_array($type, ['text', 'tile group'])) {
            $data['contentable_id'] = $data[strtolower(Utils::getContentableTypes()[$data['contentable_type']]) . '_id'];
        }

        $validator = Validator::make($request->all(), [
            'contentable_type' => 'required',
            'columns'          => 'required',
            'accordion_id'   => 'required_if:contentable_type,App\Models\CmsAccordion',
            'gallery_id'    => 'required_if:contentable_type,App\Models\CmsGallery',
            'slider_id'     => 'required_if:contentable_type,App\Models\CmsSlider',
            'tile_columns'  => 'required_if:contentable_type,App\Models\CmsTileGroup|numeric',
            'tile_rows' => 'required_if:contentable_type,App\Models\CmsTileGroup|numeric'
        ]);

        if (!$validator->passes())
            return response()->json(['status' => 406, 'error' => $validator->errors()->all()], 406);

        $slug = Str::slug($cmsPage->slug . '-' . Utils::getContentableTypes()[$data['contentable_type']]);
        if (isset($request->columns))
            $slug = Str::slug($cmsPage->slug . '-' . $request->columns . 'col-' . Utils::getContentableTypes()[$data['contentable_type']]);

        $node = CmsNode::create([
            'slug' => $slug,
            'cms_page_id' => $cmsPage->id
        ]);

        for ($k = 1; $k <= $request->columns; $k++) {
            if ($data['contentable_type'] === 'App\\Models\\CmsContent') {
                $data['slug'] = $node->slug . '-col' . $k;
                $cmsContent = CmsContent::create($data);
                $data['contentable_id'] = $cmsContent->id;
            } else if ($data['contentable_type'] === 'App\\Models\\CmsTileGroup') {
                $cmsTileGroup = CmsTileGroup::create(["style" => $request->tile_style,
                                                    "columns" => $request->tile_columns,
                                                    "rows" => $request->tile_rows]);
                $data['slug'] = 'tile-group-' . $cmsTileGroup->id . '-col' . $k;
                $data['contentable_id'] = $cmsTileGroup->id;
            }
            $data['cms_node_id'] = $node->id;
            CmsNodeContent::create($data);
        }

        $response['contentable_type'] = $data['contentable_type'];
        $response['columns'] = $data['columns'];
        $response['data'] = $node;
        $response['contents'] = $node->nodeContents;
        foreach ($node->nodeContents as $key => $value) {
            $response['contents'][$key]['content'] = $value->contentable;

            if ($data['contentable_type'] === 'App\\Models\\CmsAccordion') {
                foreach ($value->contentable->items as $key => $value) {
                    $response['entries'][$key] = $value;
                }
            }
            if ($data['contentable_type'] === 'App\\Models\\CmsGallery') {
                foreach ($value->contentable->getMedia('images') as $key => $value) {
                    $response['entries'][$key] = $value;
                }
            }
        }

        if (count($cmsPage->nodes) > 0) {
            $reorder = $cmsPage->nodes->pluck('id')->toArray();
            array_unshift($reorder, $node->id);
            foreach ($reorder as $index => $id) {
                CmsNode::where('id', $id)->update(['sort_order' => $index + 1]);
            }
        }

        $view = view('admin.pages.partials._node', compact('node', 'sliders', 'accordions', 'galleries', 'tiles'))->render();

        return response()->json(['status' => 201, 'success' => 'You have successfully added this node!', 'view' => $view], 201);
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        CmsNode::where('id', $id)->delete();

        return response()->json(['status' => 200, 'success' => 'You have successfully deleted this node!'], 200);
    }

    /**
     * Sort node order.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sortOrder(Request $request)
    {
        foreach ($request->siblings as $index => $sibling) {
            CmsNode::where('id', $sibling)->update(['sort_order' => $index + 1]);
        }

        return response()->json(['status' => 400, 'error' => 'You have successfully sorted these nodes!'], 400);
    }
}
