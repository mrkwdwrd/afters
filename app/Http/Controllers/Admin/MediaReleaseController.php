<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MediaRelease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MediaReleaseController extends Controller
{
 /**
     * Index of media releases
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mediaReleases = MediaRelease::paginate(50);

        return view('admin.media-releases.index', compact('mediaReleases'));
    }

    /**
     * Create a new media release
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $mediaRelease = MediaRelease::create($request->all());

        return redirect()->to('/admin/media-releases/' . $mediaRelease->id . '/edit')->with('success', 'You have successfully created this media release!');
    }

    /**
     * Edit media release
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mediaRelease = MediaRelease::whereId($id)->firstOrFail();

        return view('admin.media-releases.edit', compact('mediaRelease'));
    }

    /**
     * Update existing media release
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $mediaRelease = MediaRelease::whereId($id)->firstOrFail();
        $mediaRelease->update($request->all());

        return redirect()->to('/admin/media-releases')->with('success', 'You have successfully updated this media release!');
    }

    /**
     * Delete media release
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $mediaRelease = MediaRelease::whereId($id)->firstOrFail();

        $mediaRelease->delete();

        return redirect()->back()->with('success', 'You have successfully deleted this media release!');
    }
}
