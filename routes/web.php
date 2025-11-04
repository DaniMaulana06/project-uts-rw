<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BungaController;
use Illuminate\Support\Facades\Route;


Route::get('/beranda', function () {
    return view('user.beranda');
});

Route::get('/about', function () {
    return view('user.about');
});

Route::get('/produk', [BungaController::class, 'index'])->name('bunga.index');


//route admin
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/bunga', [BungaController::class, 'adminIndex'])->name('bunga.index');
    Route::get('/bunga/create', [BungaController::class, 'create'])->name('bunga.create');
    Route::post('/bunga', [BungaController::class, 'store'])->name('bunga.store');
    Route::get('/bunga/{id}/edit', [BungaController::class, 'edit'])->name('bunga.edit');
    Route::put('/bunga/{id}', [BungaController::class, 'update'])->name('bunga.update');
    Route::delete('/bunga/{id}', [BungaController::class, 'destroy'])->name('bunga.destroy');
});

Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Checkout route - PENTING!
Route::get('checkout/{id}', [CartController::class, 'checkout'])->name('checkout.form');
Route::post('checkout/store', [OrderController::class, 'store'])->name('checkout.store');

//login
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }
    return view('admin.dashboard');
})->name('admin.dashboard');