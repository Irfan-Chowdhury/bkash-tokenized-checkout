@extends('bkash::layout')

@section('title', 'Payment Success')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto mt-5">
                    <div class="payment mb-5">
                        <div class="payment_header">
                            <div class="check"><i class="las la-check"></i></div>
                        </div>
                        <div class="content">
                            <h1>Payment Confirmed!</h1>
                            <p class="mb-3">Your payment has been confirmed successfully. Payment ID is: <b>{{ session()->get('paymentID') }}</b></p>
                            <a class="btn btn-primary" href="{{ route('checkout') }}">Go to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

