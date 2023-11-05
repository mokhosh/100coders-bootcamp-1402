<?php

use App\Livewire\CartManager;
use Illuminate\Support\Facades\Route;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

Route::get('/', function () {
    return view('welcome', [
        'products' => \App\Models\Product::get(),
    ]);
});

Route::get('cart', CartManager::class)->middleware('auth')->name('cart');

Route::post('checkout', function (\Illuminate\Http\Request $request) {
    // $cart->verify();
    
    $invoice = (new Invoice)->amount($request->user()->cart->total);

    return Payment::callbackUrl(url('verify'))
        ->purchase($invoice, function($driver, $transactionId) use ($request) {
            $request->user()->cart->update(['gateway_ref' => $transactionId]);
        })->pay()->render();
});

Route::any('verify', function (\Illuminate\Http\Request $request) {
    try {
        $cart = $request->user()->cart;
        $receipt = Payment::amount($cart->total)
            ->transactionId($cart->gateway_ref)
            ->verify();

        $order = $request->user()->orders()->create([
            'address_id' => $cart->address_id,
            'voucher_id' => $cart->voucher_id,
        ]);

        $cart->products->each(function ($product) use ($order) {
            $order->products()->attach($product, [
                'count' => $product->pivot->count,
                'price' => $product->price,
            ]);
        });

        $order->payment()->create([
            'user_id' => $request->user()->id,
            'total' => $cart->total,
            'gateway' => $receipt->getDriver(),
            'tracking_code' => $receipt->getReferenceId(),
        ]);

        $cart->reset();
    } catch (InvalidPaymentException $exception) {
        // return error view
        echo $exception->getMessage();
    }
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
