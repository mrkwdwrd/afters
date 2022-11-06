<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    /**
     * Store a newly created media (file/image/video) in Froala eidtor.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $path = $request->file->storeAs('media', $this->makeFilename($request->file), 'uploads');

        return response()->json(['link' => '/uploads/' . $path], 200);
    }

    /**
     * Make a new unique filename, append time to the original file name.
     *
     * @param  \Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    private function makeFilename(UploadedFile $file)
    {
        $originalName = $file->getClientOriginalName();
        $extension = '.' . $file->getClientOriginalExtension();
        $baseName = basename($originalName, $extension);

        //only allow letters, numbers, underscore and hyphen
        $baseName = preg_replace('/[^A-Za-z0-9\-\_]/', '', $baseName);

        return $baseName . '-' . time() . $extension;
    }

    /**
     * Index of media
     *
     * @return \Illuminate\HttpResponse
     */
    public function index()
    {
        $search = request()->search;
        $media = Media::when(request()->search, function ($query) use ($search) {
            return $query->where('file_name', 'LIKE', '%' . $search . '%');
        })->whereIn('mime_type', ['image/bmp', 'image/gif', 'image/jpeg', 'image/svg+xml', 'image/png'])
            ->orderBy('created_at', 'DESC')
            ->paginate(48);

        foreach ($media as $m) {
            switch ($m->model_type) {
                case 'App\\BlogPost':
                    $m->source_url = '/admin/blog/' . $m->model_id . '/edit';
                    break;
                case 'App\\CmsGallery':
                    $m->source_url = '/admin/galleries/' . $m->model_id . '/edit';
                    break;
                case 'App\\CmsPage':
                    $m->source_url = '/admin/pages/' . $m->model_id . '/edit';
                    break;
                case 'App\\CmsSlider':
                    $m->source_url = '/admin/sliders/' . $m->model_id . '/edit';
                    break;
                case 'App\\Person':
                    $m->source_url = '/admin/people/' . $m->model_id . '/edit';
                    break;
            }
        }
        return view('admin.media.index', compact('media'));
    }

    /**
     * Delete media
     *
     * @param int     $id
     */
    public function destroy($id)
    {
        $media = Media::whereId($id)->firstOrFail();

        $media->delete();

        return response()->json(['status' => 200, 'success' => 'You have successfully deleted this image!'], 200);
    }
}
