<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\Utils;
use App\Models\Tile;
use Validator;

class TileController extends Controller
{
    /**
     * Index of tiles
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiles = Tile::all();

        return view('admin.tiles.index', compact('tiles'));
    }

    /**
     * Create new tile
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator)->withInput();

        $tile = Tile::create(['name' => $request->name]);

        return redirect()->to('/admin/tiles/' . $tile->id . '/edit')->with('success', 'You have successfully created this tile!');
    }

    /**
     * Edit tile
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tile = Tile::where('id', $id)->firstOrFail();
        $colours = Utils::getColours();

        return view('admin.tiles.edit', compact('tile', 'colours'));
    }

    /**
     * Update existing tile
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $tile = Tile::where('id', $id)->first();
        $tile->update($request->all() + [
            'button_colour' => isset($request->colour_select) && !empty($request->colour_select) ? $request->colour_select
                : (isset($request->colour_input) && !empty($request->colour_input) ? $request->colour_input : $tile->button_colour)
        ]);

        if (isset($request->image)) {
            $tile->addMedia($request->image)->usingFileName($request->image->getClientOriginalName())->toMediaCollection('image');
        }

        return redirect()->to('/admin/tiles')->with('success', 'You have successfully updated this tile!');
    }

    /**
     * Delete tile
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Tile::where('id', $id)->delete();

        return redirect()->back()->with('success', 'You have successfully deleted this tile!');
    }
}
