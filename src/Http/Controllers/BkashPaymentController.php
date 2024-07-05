<?php

namespace IrfanChowdhury\BkashTokenizedCheckout\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use IrfanChowdhury\BkashTokenizedCheckout\Http\Requests\SubmitRequest;
use IrfanChowdhury\BkashTokenizedCheckout\Services\PaymentService;

class BkashPaymentController extends Controller
{
    public function checkout()
    {
        return view('bkash::checkout');
    }

    public function paymentProcees(PaymentService $paymentService, SubmitRequest $request)
    {
        try {
            $payment = $paymentService->initialize($request->payment_method);

            return $payment->pay($request);
        }
        catch (Exception $e) {

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
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
