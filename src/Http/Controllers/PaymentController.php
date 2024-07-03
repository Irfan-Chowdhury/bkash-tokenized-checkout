<?php

namespace IrfanChowdhury\BkashTokenizedCheckout\Http\Controllers;

// use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        return view('bkash::checkout');
    }
}
