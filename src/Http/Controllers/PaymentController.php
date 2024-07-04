<?php

namespace IrfanChowdhury\BkashTokenizedCheckout\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use IrfanChowdhury\BkashTokenizedCheckout\Services\PaymentService;

class PaymentController extends Controller
{
    public function checkout()
    {
        return view('bkash::checkout');
    }

    public function paymentProcees(PaymentService $paymentService, Request $request)
    {
        $payment = $paymentService->initialize($request->payment_method);

        return $payment->pay($request);
    }

    public function bkashCallback(PaymentService $paymentService, Request $request)
    {
        $payment = $paymentService->initialize('bkash');
        $isPaymentSuccess = $payment->paymentStatusCheck($request);

        if(!$isPaymentSuccess){
            // Display your error message where you want.
            return redirect(route("checkout"), 307);
        }

        // Write your other logic

        return 'success';
    }
}
