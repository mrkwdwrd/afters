<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CmsPage;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Taxon;
use Illuminate\Http\Request;
use App\Models\Taxonomy;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Product index
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug = 'shop') // TODO: set shop page slug in sitesettings
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

        $cmsPage = CmsPage::whereSlug($slug)->firstOrFail();

        $taxonomies = Taxonomy::isType('product')->get();

        return view('products.index', compact('products', 'taxonomies', 'cmsPage'));
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::whereSlug($slug)->firstOrFail();

        $productTaxonomies = Taxonomy::isType('product')->get();

        $variantTaxonomies = Taxonomy::isType('variant')->get();

        $specifications = Specification::all();

        $orderableTypes = OrderItem::ORDERABLE_TYPES;

        return view('products.show', compact('product', 'productTaxonomies', 'variantTaxonomies', 'specifications', 'orderableTypes'));
    }

    /**
     * Show all product categories
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function categories($slug = 'shop')
    {
        $cmsPage = CmsPage::whereSlug($slug)->firstOrFail();

        $taxonomies = Taxonomy::isType('product')->get();

        return view('categories.index', compact('taxonomies', 'cmsPage'));
    }

    /**
     * Show all products in a category
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function category($category, $slug = 'shop')
    {
        $category = Taxon::whereSlug($category)->firstOrFail();

        $cmsPage = CmsPage::whereSlug($slug)->firstOrFail();

        $products = Product::whereHas('taxons', function ($query) use ($category) {
            return $query->where('id', $category->id);
        })->when(isset(request()->sort), function ($query) {
            switch (request()->sort) {
                case 'a-z':
                    return $query->orderBy('name', 'ASC');
                case 'z-a':
                    return $query->orderBy('name', 'DESC');
                case 'oldest':
                    return $query->orderBy('created_at', 'ASC');
                case 'newest':
                default:
                    return $query->orderBy('created_at', 'DESC');
            }
        })->paginate(30);

        return view('categories.show', compact('category', 'products', 'cmsPage'));
    }
}
