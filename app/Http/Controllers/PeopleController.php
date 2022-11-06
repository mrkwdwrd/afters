<?php

namespace App\Http\Controllers;

use App\Models\CmsPage;
use App\Models\Person;
use Illuminate\Http\Response;

class PeopleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param $category
     * @param $slug
     *
     * @return Response
     */
    public function index($slug)
    {
        $people = Person::get();
        $cmsPage = CmsPage::where('slug', $slug)->first();

        return view('people.index', compact('people', 'cmsPage'));
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     *
     * @throws \App\Exceptions\PersonNotFoundException
     *
     * @return Response
     */
    public function show($slug)
    {
        $person = Person::where('slug', $slug)->first();
        if (!$person)
            app()->abort('404');

        return view('people.show', compact('person'));
    }
}
