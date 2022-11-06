<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\ShippingCharge;
use App\Models\ShippingItem;
use App\Models\ShippingMethod;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use DougSisk\CountryState\CountryState;
use Illuminate\Support\Arr;



class ShippingItemController extends Controller
{
    use FileTrait;

    public function __construct()
    {
        $this->countries = new CountryState();
    }

    /**
     * Create a new shippingItem

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

        ShippingItem::create($request->all());

        return redirect()->route('admin.shipping.index')->with('success', 'You have successfully created this shipping item!');
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
        $shippingItem = ShippingItem::where('id', $id)->firstOrFail();
        $shippingMethods = ShippingMethod::all();

        return view('admin.shipping.edit_item', compact('shippingItem', 'shippingMethods'));
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

        $shippingItem = ShippingItem::where('id', $id)->firstOrFail();

        $shippingItem->update($request->all());

        return redirect()->route('admin.shipping.index')->with('success', 'You have successfully updated this shipping item!');
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
        $shippingItem = ShippingItem::where('id', $id)->firstOrFail();

        $shippingItem->delete();

        return redirect()->route('admin.shipping.index')->with('success', 'You have successfully deleted this shipping method!');
    }

    /**
     * Show form for editing shipping charges
     *
     * @param int $id
     * @param int $method_id
     * @return void
     */
    public function charges($id, $method_id)
    {
        $shippingItem = ShippingItem::where('id', $id)->with('shippingCharges')->firstOrFail();
        $shippingMethod = ShippingMethod::where('id', $method_id)->firstOrFail();
        $shippingCharges = $shippingItem->shippingCharges->where('shipping_method_id', $method_id);

        $countries = $this->countries->getCountries();
        $unsetCountries = Arr::except($countries, $shippingCharges->pluck('country_iso')->toArray());
        $restOfWorld = $shippingCharges->whereNull('country_iso')->first();

        return view('admin.shipping.edit_charges', compact('shippingItem', 'shippingMethod', 'shippingCharges', 'unsetCountries', 'restOfWorld'));
    }

    /**
     * Update shippin charges
     *
     * @param Request $request
     * @param int $item_id
     * @param int $method_id
     * @return void
     */
    public function updateCharges(Request $request, $item_id, $method_id)
    {
        $shippingCharges = ShippingCharge::where('shipping_item_id', $item_id)->where('shipping_method_id', $method_id)->get();

        foreach ($shippingCharges as $charge) {
            $charge->delete();
        }

        if ($charges = $request->input('charges')) {
            foreach ($charges as $charge) {
                ShippingCharge::create($charge + [
                    'shipping_item_id'      => $item_id,
                    'shipping_method_id'    => $method_id
                ]);
            }
        }
        if ($request->enable_rest_of_world) {
            ShippingCharge::create([
                'shipping_item_id'      => $item_id,
                'shipping_method_id'    => $method_id,
                'country_iso'           => null,
                'base_charge'           => $request->rest_of_world['base_charge'],
                'item_charge'           => $request->rest_of_world['item_charge'],
            ]);
        }

        return redirect()->back()->with('success', 'You have successfully updated the shipping charges!');
    }
}
