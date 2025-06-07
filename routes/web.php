<?php

use App\Http\Middleware\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Exports\LaporanPenjualanExport;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MidtransController;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('auth.register');
    Route::get('/login', 'loginForm')->name('auth.login');
    Route::post('/register', 'store')->name('register');
    Route::get('/activate/{token}', 'activate')->name('auth.activate');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});

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
Route::middleware(Auth::class)->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});
