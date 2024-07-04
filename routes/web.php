<?php

use Illuminate\Support\Facades\Route;
use IrfanChowdhury\BkashTokenizedCheckout\Http\Controllers\PaymentController;

Route::get('/bkash', function () {
    return 'bkash';
});

Route::controller(PaymentController::class)->group(function () {
    Route::prefix('payment')->group(function () {
        Route::get('checkout', 'checkout')->name('checkout');
        Route::post('/process', 'paymentProcees')->name('payment.process');
        Route::get('bkash/callback','bkashCallback');
        Route::get('success', 'paymentSuccess')->name('payment.success');
    });
});
