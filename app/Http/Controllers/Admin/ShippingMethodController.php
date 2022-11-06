<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingMethod;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class ShippingMethodController extends Controller
{
    use FileTrait;

    /**
     * Create a new shippingMethod

     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        ShippingMethod::create($request->all());

        return redirect()->route('admin.shipping.index')->with('success', 'You have successfully created this shipping method!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shippingMethod = ShippingMethod::where('id', $id)->firstOrFail();

        return view('admin.shipping.edit_method', compact('shippingMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $shippingMethod = ShippingMethod::where('id', $id)->firstOrFail();

        $shippingMethod->update($request->all());

        return redirect()->route('admin.shipping.index')->with('success', 'You have successfully updated this shipping method!');
    }

    /**
     * Delete (soft) the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $shippingMethod = ShippingMethod::where('id', $id)->firstOrFail();

        $shippingMethod->delete();

        return redirect()->route('admin.shipping.index')->with('success', 'You have successfully deleted this shipping method!');
    }
}
