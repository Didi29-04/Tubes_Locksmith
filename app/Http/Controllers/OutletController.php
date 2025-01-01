<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OutletController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $outlets = Outlet::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%");
        })->paginate(10); // Paginate 10 items per page

        return view('outlets.index', compact('outlets', 'search'));
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

        Alert::success('Added Successfully', 'Location Added Successfully.');

        Outlet::create($request->all());
        return redirect()->route('outlets.index');
    }

    public function show($id)
    {
        $outlet = Outlet::findOrFail($id); // Ambil data berdasarkan id, atau 404 jika tidak ditemukan
        return view('outlets.show', compact('outlet'));
    }

    public function edit($id)
    {
        $outlet = Outlet::findOrFail($id); // Ambil data outlet berdasarkan ID
        return view('outlets.edit', compact('outlet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $outlet = Outlet::findOrFail($id);
        $outlet->update($request->all()); // Update data outlet

        Alert::success('Changed Successfully', 'Location Changed Successfully.');
        return redirect()->route('outlets.index');
    }

    public function destroy($id)
    {
        $outlet = Outlet::findOrFail($id); // Cari data berdasarkan ID
        $outlet->delete(); // Hapus data dari database

        Alert::success('Deleted Successfully', 'Location Deleted Successfully.');
        return redirect()->route('outlets.index');
    }

    public function welcome()
    {
        $outlets = Outlet::all(); // Ambil semua data outlet
        dd($outlets);
        return view('welcome', compact('outlets'));
    }
}
