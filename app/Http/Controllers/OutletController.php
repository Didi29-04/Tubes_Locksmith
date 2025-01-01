<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
class OutletController extends Controller
{
    public function index()
    {
        $outlets = Outlet::all();
        return view('outlets.index', compact('outlets'));
    }

    public function create()
    {
        return view('outlets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Outlet::create($request->all());
        return redirect()->route('outlets.index');
    }

    public function show(Outlet $outlet)
    {
        return view('outlets.show', compact('outlet'));
    }
}
