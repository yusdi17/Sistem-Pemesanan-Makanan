<?php

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Exports\LaporanPenjualanExport;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MidtransController;

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

Route::get('/checkout-success', function () {
    return view('checkout.success');
})->name('checkout.success');

Route::get('/laporan/export', function () {
    $periode = request()->get('periode', 'hari');
    return Excel::download(new LaporanPenjualanExport($periode), 'laporan-penjualan.xlsx');
})->name('laporan.export');

Route::get('/checkout/success', function () {
    return view('checkout.success');
})->name('checkout.success');

Route::get('/checkout/pending', function () {
    return view('checkout.pending');
})->name('checkout.pending');

Route::get('/checkout/failed', function () {
    return view('checkout.failed');
})->name('checkout.failed');

Route::post('/midtrans/callback', [MidtransController::class, 'callback'])->name('midtrans.callback');
