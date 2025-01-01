<?php

namespace App\Http\Controllers;

use App\Models\Outlet; // Pastikan model Outlet ada
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Tampilkan daftar semua lokasi.
     */
    public function index()
    {
        $outlets = Outlet::all(); // Ambil semua data outlet
        return view('locations.index', compact('outlets')); // Tampilkan ke view locations.index
    }

    /**
     * Tampilkan detail lokasi berdasarkan ID.
     */
    public function show($id)
    {
        $outlet = Outlet::findOrFail($id); // Cari outlet berdasarkan ID
        return view('locations.detail', compact('outlet')); // Tampilkan ke view locations.detail
    }

    public function welcome()
    {
        // Ambil semua data outlet dari database
        $outlets = Outlet::all();

        // Return view welcome dengan data outlet
        return view('welcome', compact('outlets'));
    }
}
