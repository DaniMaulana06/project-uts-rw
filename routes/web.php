<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BungaController;

Route::get('/beranda', function () {
    return view('user.beranda');
});

Route::get('/about', function () {
    return view('user.about');
});

Route::get('/produk', [BungaController::class, 'index']);

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/bunga', [BungaController::class, 'adminIndex'])->name('bunga.index');
    Route::get('/bunga/create', [BungaController::class, 'create'])->name('bunga.create');
    Route::post('/bunga', [BungaController::class, 'store'])->name('bunga.store');
    Route::get('/bunga/{id}/edit', [BungaController::class, 'edit'])->name('bunga.edit');
    Route::put('/bunga/{id}', [BungaController::class, 'update'])->name('bunga.update');
    Route::delete('/bunga/{id}', [BungaController::class, 'destroy'])->name('bunga.destroy');
});
