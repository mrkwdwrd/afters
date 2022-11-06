<?php

namespace App\Http\Controllers;

use Composer\DependencyResolver\Request;
use DougSisk\CountryState\CountryState;

class CountryController extends Controller
{

    /**
     * Create a new instance of CountryController
     *
     */
    public function __construct()
    {
        $this->countries = new CountryState();
    }

    /**
     * List all countries
     *
     * @return \Illuminate\Http\Response
     */
    public function getCountries()
    {
        $countries = $this->countries->getCountries();

        return response()->json($countries);
    }

    /**
     * Find country and it's divisions by it's common name
     *
     * @param String $name
     * @return \Illuminate\Http\Response
     */
    public function getStates($country)
    {
        $states = $this->countries->getStates($country);

        return response()->json($states);
    }
}
