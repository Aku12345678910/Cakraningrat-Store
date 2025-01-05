<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // Pastikan Anda sudah membuat controller ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route untuk halaman utama (index)
Route::get('/', function () {
    return view('index'); // Mengarahkan ke view index.blade.php
})->name('home');

// Route untuk halaman produk
Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');

// Route untuk halaman detail produk
Route::get('/produk-detail', [ProductController::class, 'show'])->name('produk.detail');

// Route untuk halaman tentang
Route::get('/tentang', function () {
    return view('tentang'); // Mengarahkan ke view tentang.blade.php
})->name('tentang');