<?php

return [
    'default' => 'zarinpal',

    'drivers' => [
        'local' => [
            'callbackUrl' => '/callback',
            'title' => 'درگاه پرداخت تست',
            'description' => 'این درگاه *صرفا* برای تست صحت روند پرداخت و لغو پرداخت میباشد',
            'orderLabel' => 'شماره سفارش',
            'amountLabel' => 'مبلغ قابل پرداخت',
            'payButton' => 'پرداخت موفق',
            'cancelButton' => 'پرداخت ناموفق',
        ],
        'zarinpal' => [
            /* normal api */
            'apiPurchaseUrl' => 'https://api.zarinpal.com/pg/v4/payment/request.json',
            'apiPaymentUrl' => 'https://www.zarinpal.com/pg/StartPay/',
            'apiVerificationUrl' => 'https://api.zarinpal.com/pg/v4/payment/verify.json',

            /* sandbox api */
            'sandboxApiPurchaseUrl' => 'https://sandbox.zarinpal.com/pg/services/WebGate/wsdl',
            'sandboxApiPaymentUrl' => 'https://sandbox.zarinpal.com/pg/StartPay/',
            'sandboxApiVerificationUrl' => 'https://sandbox.zarinpal.com/pg/services/WebGate/wsdl',

            /* zarinGate api */
            'zaringateApiPurchaseUrl' => 'https://ir.zarinpal.com/pg/services/WebGate/wsdl',
            'zaringateApiPaymentUrl' => 'https://www.zarinpal.com/pg/StartPay/:authority/ZarinGate',
            'zaringateApiVerificationUrl' => 'https://ir.zarinpal.com/pg/services/WebGate/wsdl',

            'mode' => 'sandbox', // can be normal, sandbox, zaringate
            'merchantId' => env('ZARINPAL_MERCHANT'),
//            'callbackUrl' => url('verify'),
            'description' => 'payment using zarinpal',
            'currency' => 'T', //Can be R, T (Rial, Toman)
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Maps
    |--------------------------------------------------------------------------
    |
    | This is the array of Classes that maps to Drivers above.
    | You can create your own driver if you like and add the
    | config in the drivers array and the class to use for
    | here with the same name. You will have to extend
    | Shetabit\Multipay\Abstracts\Driver in your driver.
    |
    */
    'map' => [
        'local' => \Shetabit\Multipay\Drivers\Local\Local::class,
        'fanavacard' => \Shetabit\Multipay\Drivers\Fanavacard\Fanavacard::class,
        'asanpardakht' => \Shetabit\Multipay\Drivers\Asanpardakht\Asanpardakht::class,
        'atipay' => \Shetabit\Multipay\Drivers\Atipay\Atipay::class,
        'behpardakht' => \Shetabit\Multipay\Drivers\Behpardakht\Behpardakht::class,
        'digipay' => \Shetabit\Multipay\Drivers\Digipay\Digipay::class,
        'etebarino' => \Shetabit\Multipay\Drivers\Etebarino\Etebarino::class,
        'idpay' => \Shetabit\Multipay\Drivers\Idpay\Idpay::class,
        'irankish' => \Shetabit\Multipay\Drivers\Irankish\Irankish::class,
        'nextpay' => \Shetabit\Multipay\Drivers\Nextpay\Nextpay::class,
        'omidpay' => \Shetabit\Multipay\Drivers\Omidpay\Omidpay::class,
        'parsian' => \Shetabit\Multipay\Drivers\Parsian\Parsian::class,
        'pasargad' => \Shetabit\Multipay\Drivers\Pasargad\Pasargad::class,
        'payir' => \Shetabit\Multipay\Drivers\Payir\Payir::class,
        'paypal' => \Shetabit\Multipay\Drivers\Paypal\Paypal::class,
        'payping' => \Shetabit\Multipay\Drivers\Payping\Payping::class,
        'paystar' => \Shetabit\Multipay\Drivers\Paystar\Paystar::class,
        'poolam' => \Shetabit\Multipay\Drivers\Poolam\Poolam::class,
        'sadad' => \Shetabit\Multipay\Drivers\Sadad\Sadad::class,
        'saman' => \Shetabit\Multipay\Drivers\Saman\Saman::class,
        'sep' => \Shetabit\Multipay\Drivers\SEP\SEP::class,
        'sepehr' => \Shetabit\Multipay\Drivers\Sepehr\Sepehr::class,
        'walleta' => \Shetabit\Multipay\Drivers\Walleta\Walleta::class,
        'yekpay' => \Shetabit\Multipay\Drivers\Yekpay\Yekpay::class,
        'zarinpal' => \Shetabit\Multipay\Drivers\Zarinpal\Zarinpal::class,
        'zibal' => \Shetabit\Multipay\Drivers\Zibal\Zibal::class,
        'sepordeh' => \Shetabit\Multipay\Drivers\Sepordeh\Sepordeh::class,
        'rayanpay' => \Shetabit\Multipay\Drivers\Rayanpay\Rayanpay::class,
        'sizpay' => \Shetabit\Multipay\Drivers\Sizpay\Sizpay::class,
        'vandar' => \Shetabit\Multipay\Drivers\Vandar\Vandar::class,
        'aqayepardakht' => \Shetabit\Multipay\Drivers\Aqayepardakht\Aqayepardakht::class,
        'azki' => \Shetabit\Multipay\Drivers\Azki\Azki::class,
        'payfa' => \Shetabit\Multipay\Drivers\Payfa\Payfa::class,
        'toman' => \Shetabit\Multipay\Drivers\Toman\Toman::class,
    ]
];
