<?php

namespace App\Http\Controllers;

use App\Thana;
use App\TSO;
use App\TSOThanaMap;
use Illuminate\Http\Request;

class TSOMappingController extends Controller
{
    public function index()
    {
        $maps = TSOThanaMap::with('tso', 'thana')->orderBy('id', 'desc')->paginate(20);
        return view('tso_map.list', compact('maps'));
    }

    public function create()
    {
        $tsos = TSO::orderBy('name')->get();
        $thanas = Thana::orderBy('name')->get();
        return view('tso_map.form', compact('tsos', 'thanas'));
    }

    public function store(Request $request)
    {
        $map = new TSOThanaMap();
        $map->tso_id = $request->tso_id;
        $map->thana_id = $request->thana_id;
        $map->is_active = $request->is_active === "on" ? 1 : 0;
        $map->save();
        return redirect('/tso-mapping')->with('success', 'Inserted Successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $map = TSOThanaMap::find($id);
        $tsos = TSO::orderBy('name')->get();
        $thanas = Thana::orderBy('name')->get();
        return view('tso_map.form', compact('map', 'tsos', 'thanas'));
    }

    public function update(Request $request, $id)
    {
        $map = TSOThanaMap::find($id);
        $map->tso_id = $request->tso_id;
        $map->thana_id = $request->thana_id;
        $map->is_active = $request->is_active === "on" ? 1 : 0;
        $map->save();
        return redirect('/tso-mapping')->with('success', 'Updated Successfully.');
    }

    public function destroy($id)
    {
        //
    }
}
