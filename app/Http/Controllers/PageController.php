<?php

namespace App\Http\Controllers;

use App\Models\CmsPage;

class PageController extends Controller
{
    /**
     * Show the page.
     *
     * @param string $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $cmsPage = CmsPage::where('slug', $slug)->first();
        if (!$cmsPage)
            app()->abort('404');

        if (view()->exists('pages/'.$slug))
            return view('pages.'.$slug, compact('cmsPage'));

        return view('pages.show', compact('cmsPage'));
    }
}
