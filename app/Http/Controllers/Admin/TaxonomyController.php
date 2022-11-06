<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Taxon;
use App\Models\Taxonomy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TaxonomyController extends Controller
{
    /**
     * Taxonomy index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxonomies = Taxonomy::all();

        return view('admin.taxonomies.index', compact('taxonomies'));
    }

    /**
     * Create new taxon
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'taxon_name' => 'required',
            'taxonomy_id' => 'required'
        ], [
            'taxon_name.required' => 'Please enter a name for the new taxon',
            'taxonomy_id.required' => 'Please make sure this taxon belongs to a taxonomy'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('form', 'taxon');
        }

        Taxon::create([
            'taxonomy_id' => $request->taxonomy_id,
            'parent_id' => !empty($request->parent_id) ? $request->parent_id : null,
            'name' => $request->taxon_name,
        ]);

        return redirect()->back()->with('success', 'You have successfully created this taxon!');
    }

    /**
     * Create new taxon
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxCreate(Request $request, $id)
    {
        $taxon = Taxon::create([
            'taxonomy_id' => $id,
            'name' => $request->text,
        ]);

        return response()->json([
            'status'  => 201,
            'id'      => $taxon->id,
            'name'    => $taxon->name,
            'slug'    => $taxon->slug,
            'success' => 'You have successfully created this taxon!'
        ], 201);
    }

    /**
     * Edit taxon
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editTaxon($id)
    {
        $taxon = Taxon::where('id', $id)->first();

        return view('admin.taxonomies.edit_taxon', compact('taxon'));
    }

    /**
     * Update taxon
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateTaxon(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug'      => [
                'required',
                'alpha_dash',
                Rule::unique('taxons')->ignore($id, 'id')
            ]
        ], [
            'name.required' => 'Please select a name for the new taxon',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $taxon = Taxon::where('id', $id)->first();
        $taxon->update(['name' => $request->name, 'slug' => Str::slug($request->name)]);

        return redirect()->back()->with('success', 'You have successfully updated this taxon!');
    }

    /**
     * Create new taxonomy
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createTaxonomy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'Please enter a name for the new taxonomy',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('form', 'taxonomy');
        }

        Taxonomy::create(['name' => $request->name, 'slug' => Str::slug($request->name)]);

        return redirect()->route('admin.taxonomies.index')->with('success', 'You have successfully created this taxonomy!');
    }


    /**
     * Edit taxonomy
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editTaxonomy($id)
    {
        $taxonomy = Taxonomy::where('id', $id)->first();
        return view('admin.taxonomies.edit_taxonomy', compact('taxonomy'));
    }

    /**
     * Update taxonomy
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateTaxonomy(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug'      => [
                'required',
                'alpha_dash',
                Rule::unique('taxonomies')->ignore($id, 'id')
            ]
        ], [
            'name.required' => 'Please enter a name for the taxonomy',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $taxonomy = Taxonomy::where('id', $id)->first();
        $taxonomy->update($request->all());

        return redirect()->to('/admin/taxonomies')->with('success', 'You have successfully updated this taxonomy!');
    }

    /**
     * Delete taxon
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteTaxon($id)
    {
        Taxon::where('id', $id)->delete();
        return redirect()->back()->with('success', 'You have successfully deleted this taxon!');
    }
}
