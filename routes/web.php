<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;

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

Route::get('/outlet-location', function () {
    $outlets = \App\Models\Outlet::all(); // Mengambil data dari database
    return view('outlet-location', compact('outlets'));
})->name('map');

require __DIR__.'/auth.php';
