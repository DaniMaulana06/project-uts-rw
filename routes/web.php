<?php

use Illuminate\Support\Facades\Route;

Route::get('/beranda', function () {
    return view('user.beranda');
});
Route::get('/about', function () {
    return view('user.about');
});
// Route::get('/produk', function () {
//     return view('user.produk');
// });

Route::get('/produk', [App\Http\Controllers\BungaController::class, 'index']);
