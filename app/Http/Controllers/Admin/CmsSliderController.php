<?php

namespace App\Http\Controllers\Admin;

use App\Models\CmsSlider;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Libraries\Utils;
use App\Traits\FileTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class CmsSliderController extends Controller
{
    use FileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = CmsSlider::all();

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Create a new slider
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $slider = CmsSlider::create(['name' => $request->name]);

        return redirect()->route('admin.sliders.edit', $slider->id);
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
        $slider = CmsSlider::where('id', $id)->first();
        $positions = collect(Utils::getBoxPositions());
        return view('admin.sliders.edit', compact('slider', 'positions'));
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
            'name'                       => 'required',
            'slug'                        => [
                'required',
                'alpha_dash',
                Rule::unique('cms_sliders')->ignore($id, 'id')
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $slider = CmsSlider::where('id', $id)->first();
        $slider->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        $media_name = $request->input('media_name');
        $media_headline = $request->input('media_headline');
        $media_description = $request->input('media_description');
        $media_subhead = $request->input('media_subhead');
        $media_position = $request->input('media_position');

        foreach ($slider->getMedia('images') as $key => $media) {
            if ($media_name[$media->id]) {
                $media->name = $media_name[$media->id];
            }
            $media->setCustomProperty('headline', $media_headline[$media->id]);
            $media->setCustomProperty('subhead', $media_subhead[$media->id]);
            $media->setCustomProperty('description', $media_description[$media->id]);
            $media->setCustomProperty('position', $media_position[$media->id]);
            $media->save();
        }

        return redirect()->route('admin.sliders.edit', $id)->with('success', 'You have successfully updated this slider!');
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
        CmsSlider::where('id', $id)->delete();

        return redirect()->to('admin/sliders')->with('success', 'You have successfully deleted this slider!');
    }

    /**
     * Create slider media item
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSlide(Request $request, $id)
    {
        $slider = CmsSlider::where('id', $id)->first();

        $data = $request->file('images');

        $slide = $slider->addMedia($data[0])
            ->usingFileName($this->makeFilename($data[0]))
            ->toMediaCollection('images', 'slider');

        $positions = collect(Utils::getBoxPositions());

        $slide = view("admin.sliders._slide", compact("slide", "positions"))->render();
        return response()->json(["view" => $slide], 201);
    }

    /**
     * Sort slides
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request, $id)
    {
        foreach ($request->order as $order => $id)
            Media::where('id', $id)->update(['order_column' => $order + 1]);
        return response()->json(['success' => true], 201);
    }
}
