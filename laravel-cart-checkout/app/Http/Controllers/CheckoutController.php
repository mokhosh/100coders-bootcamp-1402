<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class CheckoutController extends Controller
{
    /**
     * Prepare a checkout and start the payment process
     */
    public function __invoke(Request $request)
    {
        // $cart->verify();

        $invoice = (new Invoice)->amount($request->user()->cart->total);

        return Payment::callbackUrl(url('verify'))
            ->purchase($invoice, function($driver, $transactionId) use ($request) {
                $request->user()->cart->update(['gateway_ref' => $transactionId]);
            })->pay()->render();
    }
}
