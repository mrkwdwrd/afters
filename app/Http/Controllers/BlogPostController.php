<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogTag;
use App\Models\CmsPage;
use App\Models\Taxonomy;
use Illuminate\Http\Response;

class BlogPostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param $category
     * @param $slug
     *
     * @return Response
     */
    public function index()
    {
        $posts = BlogPost::when(!empty(request()->category), function ($query) {
            return $query->whereHas('taxons', function ($query) {
                return $query->where('slug', request()->category);
            });
        })
            ->when(!empty(request()->tag), function ($query) {
                return $query->whereHas('tags', function ($query) {
                    return $query->where('slug', request()->tag);
                });
            })->orderBy('published_at', 'DESC')
            ->paginate(config('sitesettings.nums_per_page'));

        $cmsPage = CmsPage::where('slug', 'blog')->first();
        $categories = Taxonomy::where('name', 'Blog Categories')->first()->taxons;

        $tag = null;
        if (!empty(request()->tag))
            $tag = BlogTag::where('slug', request()->tag)->first();

        return view('blog.index', compact('posts', 'cmsPage', 'categories', 'tag'));
    }

    /**
     * Display the specified resource.
     *
     * @param $category
     * @param $slug
     *
     * @return Response
     */

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->first();
        if (!$post)
            app()->abort('404');

        $cmsPage = CmsPage::where('slug', 'blog')->first();

        return view('blog.show', compact('post', 'cmsPage'));
    }
}
