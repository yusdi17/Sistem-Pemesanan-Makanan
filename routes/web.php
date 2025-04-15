<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;

// Route::get('/', function () {
//     return view('order.index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(OrderController::class)->group(function () {
    Route::get('/', 'index')->name('order.menu');
    // Route::get('/checkout', 'create')->name('checkout.create');
    // Route::post('/checkout', 'store')->name('checkout.store');
});

Route::controller(CheckoutController::class)->group(function () {
    Route::get('/checkout', 'create')->name('checkout.create');
    Route::post('/checkout', 'store')->name('checkout.store');
    Route::post('/cart/add', 'add');
    Route::get('/cart/data', 'getCart');
    Route::post('/cart/remove','remove');
});

