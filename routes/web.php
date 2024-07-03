<?php

use Illuminate\Support\Facades\Route;
use IrfanChowdhury\BkashTokenizedCheckout\Http\Controllers\PaymentController;

Route::get('/bkash', function () {
    return 'bkash';
});

Route::controller(PaymentController::class)->group(function () {
    Route::get('checkout', 'checkout')->name('checkout');
});
