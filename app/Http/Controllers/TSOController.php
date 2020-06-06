<?php

namespace App\Http\Controllers;

use App\TSO;
use Illuminate\Http\Request;

class TSOController extends Controller
{
    public function index()
    {
        $tsos = TSO::orderBy('id', 'desc')->paginate(20);
        return view('tso.list', compact('tsos'));
    }

    public function create()
    {
        return view('tso.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile_no' => 'required|max:11|regex:/(01[1-9])[0-9]{8}/',
        ]);

        $tso = new TSO();
        $tso->name = $request->name;
        $tso->mobile_no = $request->mobile_no;
        $tso->is_active = $request->is_active === "on" ? 1 : 0;
        $tso->hr_id = $request->hr_id;
        $tso->save();
        return redirect('/tsos')->with('success', 'Inserted Successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tso = TSO::find($id);
        return view('tso.form', compact('tso'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile_no' => 'required|max:11|regex:/(01[1-9])[0-9]{8}/',
        ]);

        $tso = TSO::find($id);
        $tso->name = $request->name;
        $tso->mobile_no = $request->mobile_no;
        $tso->is_active = $request->is_active === "on" ? 1 : 0;
        $tso->hr_id = $request->hr_id;
        $tso->save();
        return redirect('/tsos')->with('success', 'Updated Successfully.');
    }

    public function destroy($id)
    {
        //
    }
}
