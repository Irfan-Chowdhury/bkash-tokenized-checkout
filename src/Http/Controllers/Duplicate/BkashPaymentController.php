<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use IrfanChowdhury\BkashTokenizedCheckout\Services\PaymentService;

class BkashPaymentController extends Controller
{
    public function checkout()
    {
        return view('bkash::checkout');
    }

    public function bkashCallback(PaymentService $paymentService, Request $request)
    {
        try {
            $payment = $paymentService->initialize('bkash');

            $payment->paymentStatusCheck($request);

            session()->put('paymentID', $request->paymentID);

            // Implement your other business logic after payment done.

            return redirect()->route('payment.success')->with(['success' => 'Payment Successfully Done']);
        }
        catch (Exception $e) {

            return redirect()->route('checkout')->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
