@extends('bkash::layout')
@section('title', 'Checkout')

@section('content')

    <div class="container">

        <h1 class="text-center mt-5">Bkash Checkout</h1>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-4 d-grid gap-2 mx-auto">
                            <img src="https://freepnglogo.com/images/all_img/1701670291bKash-App-Logo-PNG.png" height="200px"
                                width="400px" style="margin-left: 40px">
                        </div>
                        <form action="{{ route('payment.process') }}" method="post">
                            @csrf

                            <input type="hidden" name="payment_method" value="bkash">
                            <div class="form-group row mt-3">
                                <label for="staticEmail" class="col-sm-3 col-form-label"><b>Amount</b></label>
                                <div class="col-sm-9">
                                    <input type="number" required class="form-control" min="10" name="amount"
                                        placeholder="Ex: 10">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-outline-success btn-lg btn-block">Pay Now</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

@endsection
