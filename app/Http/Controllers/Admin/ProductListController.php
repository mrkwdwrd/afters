<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductList;
use Illuminate\Validation\Rule;
use Validator;

class ProductListController extends Controller
{
    /**
     * All product lists
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = ProductList::orderBy('sort_order', 'ASC')->get();
        return view('admin.product_lists.index', compact('lists'));
    }

    /**
     * Create new product list
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $list = ProductList::create($request->all());

        return redirect()->to('/admin/product-lists/' . $list->id . '/edit')->with('success', 'You have successfully created this product list!');
    }

    /**
     * Edit product list
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = ProductList::whereId($id)->firstOrFail();
        $products = Product::all();

        return view('admin.product_lists.edit', compact('list', 'products'));
    }

    /**
     * Update product list
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'link_url'  => 'nullable|url'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $list = ProductList::whereId($id)->firstOrFail();

        $list->update(
            $request->all() + [
                'is_featured' => isset($request->is_featured)
            ]
        );

        $list->products()->sync(isset($request->products) ? $request->products : []);

        return redirect()->to('/admin/product-lists')->with('success', 'You have successfully updated this product list!');
    }

    /**
     * Delete product list
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        ProductList::where('id', $id)->delete();

        return redirect()->back()->with('success', 'You have successfully deleted this product list!');
    }

    /**
     * Sort product lists
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request)
    {
        foreach ($request->order as $order => $list)
            ProductList::where('id', $list)->update(['order' => ($order + 1)]);

        return response()->json(['success' => true], 200);
    }
}
