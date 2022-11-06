<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingItem;
use Validator;
use App\Models\Variant;
use App\Models\Taxonomy;
use Illuminate\Http\Request;

class VariantController extends Controller
{

    /**
     * Create a new variant
     *
     * @param Request $request
     * @param int            $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sku'        => 'required',
            'price'      => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('variant', true)->withInput();
        }

        $variant = Variant::create($request->all());

        $variant->taxons()->sync($request->taxon_ids);

        return redirect()->route('admin.products.edit', $variant->product_id)->with('success', 'You have successfully created this variant!');
    }

    /**
     * Show the form for editing a variant.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $variant = Variant::where('id', $id)->first();

        $taxonomies = Taxonomy::isType('variant')->get();

        $shippingItems = ShippingItem::all();

        return view('admin.variants.edit', compact('variant', 'taxonomies', 'shippingItems'));
    }

    /**
     * Update a variant.
     *
     * @param Request $request
     * @param int            $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $variant = Variant::where('id', $id)->first();
        $variant->update($request->all() + [
            'is_active' => isset($request->is_active),
            'is_sold_out' => isset($request->is_sold_out),
            'is_limited' => isset($request->is_limited),
        ]);

        if ($request->taxon_ids) {
            $variant->taxons()->sync($request->taxon_ids);
        }

        return redirect()->route('admin.products.edit', $variant->product_id)->with('success', 'You have successfully updated this variant!');
    }

    /**
     * Deactivate a variant.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deactivate($id)
    {
        $variant = Variant::where('id', $id)->first();
        $variant->update(['is_active' => false]);

        return redirect()->route('admin.products.edit', $variant->product_id)->with('success', 'You have successfully deactivated this variant!');
    }

    /**
     * Reactivate a variant.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reactivate($id)
    {
        $variant = Variant::where('id', $id)->first();
        $variant->update(['is_active' => true]);

        return redirect()->route('admin.products.edit', $variant->product_id)->with('success', 'You have successfully reactivated this variant!');
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $variant = Variant::where('id', $id)->first();
        $product_id = $variant->product->id;
        $variant->delete();

        return redirect()->route('admin.products.edit', $product_id)->with('success', 'You have successfully deleted this variant!');
    }

    /**
     * Update the order of variants.
     *
     * @param Request $request
     * @param int $productId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateOrder(Request $request, $productId)
    {
        foreach ($request->input('position') as $index => $value) {
            Variant::findOrfail($index)->update(['position' => $value]);
        }

        return redirect()->route('admin.products.show', $productId)->with('success', 'You have successfully reordered these variants!');
    }
}
