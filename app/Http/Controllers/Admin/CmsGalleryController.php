<?php

namespace App\Http\Controllers\Admin;

use App\Models\CmsGallery;
use App\Http\Controllers\Controller;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Validator;

class CmsGalleryController extends Controller
{
    use FileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = CmsGallery::all();

        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Create a new gallery
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $gallery = CmsGallery::create(['name' => $request->name]);

        return redirect()->route('admin.galleries.edit', $gallery->id);
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
        $gallery = CmsGallery::where('id', $id)->first();

        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'slug'      => [
                'required',
                'alpha_dash',
                Rule::unique('cms_galleries')->ignore($id, 'id')
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $gallery = CmsGallery::where('id', $id)->first();

        $gallery->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        $media_name = $request->input('media_name');
        $custom_fields = ['description', 'alt'];

        foreach ($gallery->getMedia('images') as $key => $media) {
            if (isset($media_name[$media->id]))
                $media->name = $media_name[$media->id];
            foreach ($custom_fields as $field)
                $media->setCustomProperty($field, $request->{'media_' . $field}[$media->id]);

            $media->save();
        }

        return redirect()->route('admin.galleries.edit', $id)->with('success', 'You have successfully updated this gallery!');
    }

    /**
     * Deactivate the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        CmsGallery::where('id', $id)->delete();

        return redirect()->to('admin/galleries')->with('success', 'You have successfully deleted this gallery!');
    }

    /**
     * Create gallery media item
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMedia(Request $request, $id)
    {
        $gallery = CmsGallery::where('id', $id)->first();

        $data = $request->file('images');

        $media = $gallery->addMedia($data[0])
            ->usingFileName($this->makeFilename($data[0]))
            ->toMediaCollection('images', 'gallery');

        $view = view('admin.galleries._media', compact('media'))->render();

        return response()->json(['view' => $view], 201);
    }

    /**
     * Reorder the items in the gallery
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request, $id)
    {
        foreach ($request->order as $index => $media)
            Media::where('id', $media)->update(['order_column' => ($index + 1)]);

        return response()->json(['success' => true], 201);
    }
}
