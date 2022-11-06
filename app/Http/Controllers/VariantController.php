<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Variant;

class VariantController extends Controller
{
    public function show($id)
    {
        $variant = Variant::where('id', $id)->with('product')->first();
        return $variant->append(['max_qty', 'sold_out'])->toJson();
    }
}
