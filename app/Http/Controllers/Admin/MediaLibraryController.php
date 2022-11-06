<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaLibraryController extends AdminBaseController
{
    /**
     * Delete the media.
     *
     * @param Media $media
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        $media->delete();

        return response()->json(['message' => 'You have successfully deleted this media!'], 200);
    }

    /**
     * Sort the media order.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function sortOrder(Request $request)
    {
        Media::setNewOrder($request->input('order'));

        return response()->json(['message' => 'You have successfully ordered this meda!'], 201);
    }
}
