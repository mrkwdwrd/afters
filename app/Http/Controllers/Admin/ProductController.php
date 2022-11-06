<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ShippingItem;
use App\Models\Specification;
use Illuminate\Http\Request;
use App\Traits\FileTrait;
use Illuminate\Support\Facades\Validator;
use App\Models\Taxonomy;
use Illuminate\Validation\Rule;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    use FileTrait;

    /**
     * Product index
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $taxons = collect($request->except(['term', 'page']))->filter(function($item) { return !empty($item); });

        $products = Product::when(!empty($request->term), function ($query) use ($request) {
                    return $query->where('name', 'LIKE', '%' . $request->term . '%')
                        ->orWhere('slug', 'LIKE', '%' . $request->term . '%')
                        ->orWhere('introduction', 'LIKE', '%' . $request->term . '%')
                        ->orWhere('description', 'LIKE', '%' . $request->term . '%');
                })->when($taxons->count(), function($query) use ($taxons) {
                    foreach ($taxons as $taxon)
                        $query = $query->whereHas("taxons", function($query) use ($taxon) {
                                    return $query->where("slug", $taxon);
                                });

                    return $query;
                })->orderBy('name', 'ASC')->paginate(20);

        $taxonomies = Taxonomy::isType('product')->get();

        return view('admin.products.index', compact('products', 'taxonomies'));
    }

    /**
     * Create a new product
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $product = Product::create([
            'name' => $request->name,
            'type' => config('sitesettings.default_product_type')
        ]);

        if ($request->taxon_ids) {
            $product->taxons()->sync($request->taxon_ids);
        }

        return redirect()->route('admin.products.edit', $product->id)->with('success', 'You have successfully created this product!');
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
        $product = Product::find($id);

        $productTaxonomies = Taxonomy::isType('product')->get();

        $variantTaxonomies = Taxonomy::isType('variant')->get();

        $specifications = Specification::all();

        $products = Product::where('id', '!=', $id)->get();

        $shippingItems = ShippingItem::all();

        return view('admin.products.edit', compact('product', 'productTaxonomies', 'variantTaxonomies', 'specifications', 'products', 'shippingItems'));
    }

    /**
     *
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'slug'      => [
                'required',
                'alpha_dash',
                Rule::unique('products')->ignore($id, 'id')
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $product = Product::where('id', $id)->first();
        $product->update($request->all() + [
            'is_active' => isset($request->is_active),
            'is_sold_out' => isset($request->is_sold_out),
            'is_limited' => isset($request->is_limited),
        ]);

        $product->related_products()->sync(isset($data['related_products']) ? $data['related_products'] : []);
        $product->taxons()->sync($request->taxon_ids);

        if (isset($request->media_name)) {
            foreach ($request->media_name as $id => $name) {
                $media = Media::where('id', $id)->first();
                $media->update(['name' => $name]);
                $media->setCustomProperty('description', $request->media_description[$id]);
                $media->save();
            }
        }

        return redirect()->back()->with('success', 'You have successfully updated this product!');
    }

    /**
     * Deactivate the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->to('admin/products')->with('success', 'You have successfully deleted this product!');
    }

    /**
     * Create gallery media item
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMedia(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        $data = $request->file('images');

        $media = $product->addMedia($data[0])
            ->usingFileName($this->makeFilename($data[0]))
            ->toMediaCollection('images', 'product');

        $view = view('admin.products._media', compact('media'))->render();

        return response()->json(['view' => $view], 201);
    }

    /**
     * Sort media
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function sortMedia(Request $request)
    {
        foreach ($request->order as $order => $id)
            Media::where('id', $id)->update(['order_column' => $order + 1]);

        return response()->json(['success' => true], 201);
    }

    /**
     * Delete media
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function deleteMedia(Request $request)
    {
        Media::where('id', $request->id)->delete();

        return response()->json(['success' => true], 201);
    }

    /**
     * Get the HTML for the specification blade
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function addSpecificationBlade(Request $request)
    {
        $t = $request->target;
        $s = $request->key;
        $specifications = Specification::all();
        $view = view("admin.products._spec", compact("t", "s", "specifications"))->render();
        return response()->json(["success" => true, "view" => $view], 201);
    }

    /**
     * Create new spec
     *
     * @return \Illuminate\Http\Response
     */
    public function createSpec(Request $request)
    {
        $spec = Specification::create([
            'label' => trim($request->text),
        ]);

        return response()->json([
            'status'  => 201,
            'id'      => $spec->id,
            'label'   => $spec->label,
            'slug'    => $spec->slug,
            'success' => 'You have successfully created this spec!'
        ], 201);
    }
}
