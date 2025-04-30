<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HomeController; 
use Illuminate\Support\Facades\Auth;

// Route halaman utama
Route::get('/', function () {
    return view('welcome'); 
})->name('welcome');

// Auth routes
Auth::routes();

// Route yang hanya bisa diakses jika sudah login
Route::middleware(['auth'])->group(function () {
    // Route setelah login
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Route Produk 
    Route::resource('produk', ProdukController::class);

    // Search produk 
    Route::get('produk-search', [ProdukController::class, 'index'])->name('produk.search');
});

// Route fallback untuk halaman tidak ditemukan
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
