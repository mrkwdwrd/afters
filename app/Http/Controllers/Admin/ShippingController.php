<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingMethod;
use App\Models\ShippingItem;
use App\Traits\FileTrait;

class ShippingController extends Controller
{
    use FileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippingMethods = ShippingMethod::all();
        $shippingItems = ShippingItem::all();

        return view('admin.shipping.index', compact('shippingMethods', 'shippingItems'));
    }
}
