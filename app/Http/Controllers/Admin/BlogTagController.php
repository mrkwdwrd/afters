<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class BlogTagController extends Controller
{
    /**
     * Create a new tag
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:cms_blog_tags,name'
        ]);

        if ($validator->fails())
            return response()->json(['status' => 406, 'error' => $validator->errors()->toArray()], 406);

        $blogTag = BlogTag::create(['name' => $request->name]);

        return response()->json([
            'id'      => $blogTag->id,
            'name'    => $blogTag->name,
            'slug'    => $blogTag->slug,
            'success' => 'You have successfully created this tag!'
        ], 200);
    }
}
