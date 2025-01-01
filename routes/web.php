<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('outlets', OutletController::class);
});


Route::get('/', function () {
    $outlets = \App\Models\Outlet::all(); // Ambil data outlet dari database
    return view('map', compact('outlets'));
})->name('map');

// Route untuk halaman Outlet Location
Route::get('/outlet-location', function () {
    $outlets = \App\Models\Outlet::all(); // Mengambil data dari database
    return view('outlet-location', compact('outlets'));
})->name('map');

Route::get('/', function () {
    return view('welcome'); // Pastikan view welcome.blade.php ada
})->name('welcome');

Route::get('/outlets/{id}', [OutletController::class, 'show'])->name('outlets.show');
Route::get('/outlets/{id}/edit', [OutletController::class, 'edit'])->name('outlets.edit');
Route::delete('/outlets/{id}', [OutletController::class, 'destroy'])->name('outlets.destroy');


// Route Detail Location
// Route::get('/locations/{id}', [LocationController::class, 'show'])->name('locations.show');
// Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');

Route::get('/', [LocationController::class, 'welcome'])->name('welcome');
require _DIR_ . '/auth.php';