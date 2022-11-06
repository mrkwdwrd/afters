<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class PeopleController extends Controller
{
    use FileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::orderBy('sort_order', 'ASC')->get();

        return view('admin.people.index', compact('people'));
    }

    /**
     * Create a new person

     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'    => 'required',
            'surname'       => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $person = Person::create([
            'first_name' => $request->first_name,
            'surname' => $request->surname
        ]);

        return redirect()->route('admin.people.edit', $person->id)->with('success', 'You have successfully created this person!');
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
        $person = Person::where('id', $id)->first();

        $media = [];
        foreach ($person->getMedia('images') as $image) {
            $media[] = [
                'name' => $image->name,
                'type' => $image->mime_type,
                'size' => $image->size,
                'file' => $image->getUrl(),
                'data' => [
                    'id'  => $image->id,
                    'url' => $image->getFullUrl()
                ]
            ];
        }

        return view('admin.people.edit', compact('person', 'media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name'    => 'required',
            'surname'       => 'required',
            'slug'                        => [
                'required',
                'alpha_dash',
                Rule::unique('people')->ignore($id, 'id')
            ]
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator);

        Person::where('id', $id)->update([
            'title' => $request->title,
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'slug' => $request->slug,
            'content' => $request->content
        ]);

        return redirect()->route('admin.people.index')->with('success', 'You have successfully updated this person!');
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
        Person::where('id', $id)->delete();

        return redirect()->route('admin.people.index')->with('success', 'You have successfully deleted this person!');
    }

    /**
     * Sort people order.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sortOrder(Request $request)
    {
        foreach ($request->order as $order => $person)
            Person::where('id', $person)->update(['sort_order' => ($order + 1)]);

        return response()->json(['status' => 201, 'success' => 'You have successfully sorted these people!'], 201);
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
        $person = Person::where('id', $id)->first();

        $image = is_array($request->file('images')) ? $request->file('images')[0] : $request->file('images');

        $media = $person->addMedia($image)
            ->usingFileName($this->makeFilename($image))
            ->toMediaCollection('images', 'person');

        $view = view('admin.people.partials._media', compact('media'))->render();

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
        $person = Person::where('id', $id)->first();

        $person->getMedia('images')->where('id', $image)->first()->delete();

        return response()->json(['status' => 200, 'success' => 'You have successfully deleted this image!'], 200);
    }
}
