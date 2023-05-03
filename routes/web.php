<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'DashboardController@index');
Route::get('/', [DashboardController::class, 'index'])->name('berandaaja'); 
// route ini dinamakan 'berandaaja'. Sehingga kita bisa memanggil cukup namanya aja utk ngelink ke route tersebut


Route::get('/halo', function () {
    return 'Haloo Mrann';
});

// Auth::routes();
Auth::routes(['register' => false]); // menghilangkan halaman register


Route::get('products/{id}/gallery', [ProductController::class, 'gallery'])
    ->name('products.gallery');
// Route::resource('products', 'ProductController');
Route::resource('products', 'App\Http\Controllers\ProductController');
Route::resource('product-galleries', 'App\Http\Controllers\ProductGalleryController');