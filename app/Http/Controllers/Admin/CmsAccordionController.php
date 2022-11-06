<?php

namespace App\Http\Controllers\Admin;

use App\Models\CmsAccordion;
use App\Models\CmsAccordionItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class CmsAccordionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accordions = CmsAccordion::all();

        return view('admin.accordions.index', compact('accordions'));
    }

    /**
     * Create a new accordion
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $accordion = CmsAccordion::create(['name' => $request->name]);

        return redirect()->route('admin.accordions.edit', $accordion->id)->with('success', 'You have successfully created this accordion!');
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
        $accordion = CmsAccordion::where('id', $id)->first();

        return view('admin.accordions.edit', compact('accordion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug'      => [
                'required',
                'alpha_dash',
                Rule::unique('cms_accordions')->ignore($id, 'id')
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $accordion = CmsAccordion::where('id', $id)->first();
        $accordion->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        if (isset($request->anchor))
            foreach ($request->anchor as $item => $value)
                CmsAccordionItem::where('id', $item)
                    ->update([
                        'title' => $request->title[$item],
                        'content' => $request->content[$item]
                    ]);

        return redirect()->route('admin.accordions.edit', $id)->with('success', 'You have successfully updated this accordion!');
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
        CmsAccordion::where('id', $id)->delete();

        return redirect()->route('admin.accordions.index')->with('success', 'You have successfully deleted this accordion!');
    }

    /**
     * Store a newly created item.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createItem(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 406, 'error' => $validator->messages()]);
        }

        $item = CmsAccordionItem::create([
            'title' => $request->title,
            'accordion_id' => $id
        ]);
        $view = view('admin.accordions._item', compact('item'))->render();

        return response()->json([
            'status'    => 201,
            'message'   => 'You have successfully created this accordion item!',
            'view'      => $view
        ], 201);
    }

    /**
     * Delete the specified item.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteItem($accordion, $id)
    {
        CmsAccordionItem::where('id', $id)->delete();

        return redirect()->route('admin.accordions.edit', $accordion)->with('success', 'You have successfully deleted this item!');
    }

    /**
     * Delete accordion item via AJAX call
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function deleteItemAjax(Request $request)
    {
        CmsAccordionItem::where('id', $request->id)->delete();

        return response()->json(['success' => true], 200);
    }

    /**
     * Sort accordion item order
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request)
    {
        foreach ($request->order as $index => $item) {
            CmsAccordionItem::where('id', $item)->update(['sort_order' => ($index + 1)]);
        }

        return response()->json(['success' => true], 201);
    }
}
