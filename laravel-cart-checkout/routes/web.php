<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\VerifyPaymentController;
use App\Livewire\CartManager;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'products' => Product::get(),
]);

Route::middleware(['auth:sanctum', config('jetstream.auth_session')])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('cart', CartManager::class)->name('cart');
    Route::post('checkout', CheckoutController::class)->name('checkout');
    Route::any('verify', VerifyPaymentController::class)->name('verify');
});
