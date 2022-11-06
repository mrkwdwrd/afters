<?php

namespace App\Http\Controllers;

use App\Models\CmsPage;

class HomeController extends Controller
{
    /**
     * Show home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cmsPage = CmsPage::where('slug', 'home')->first();
        if (!$cmsPage)
            app()->abort('404');

        return view('pages.home', compact('cmsPage'));
    }
}
