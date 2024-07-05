<?php

use Illuminate\Support\Facades\Route;
use IrfanChowdhury\BkashTokenizedCheckout\Http\Controllers\BkashPaymentController;


Route::controller(BkashPaymentController::class)->group(function () {
    Route::prefix('payment')->group(function () {
        Route::get('checkout', 'checkout')->name('checkout');
        Route::post('/process', 'paymentProcees')->name('payment.process');
        Route::get('bkash/callback','bkashCallback');
        Route::get('success', 'paymentSuccess')->name('payment.success');

        Route::get('/success', function () {
            return view('bkash::payment-success');
        })->name('payment.success');
    });
});
