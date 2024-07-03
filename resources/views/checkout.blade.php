@extends('bkash::layout')
@section('title','Checkout')

@section('content')

<h1 class="text-center">Checkout</h1>

@include('bkash::session-message')


<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid" id="errorMessage"></div>


                    {{-- <div class="mt-4 d-grid gap-2 mx-auto">
                        <img src="{{ asset('images/payment_logo/bkash.png') }}" height="300px" width="100%">
                    </div> --}}

                    {{-- <form action="{{route('payment.pay.confirm','bkash')}}" method="post"> --}}
                    <form action="#" method="post">
                        @csrf
                        <input type="hidden" name="totalAmount" value="10">

                        <div class="mt-4 d-grid gap-2 mx-auto">
                            <button type="submit" id="payNowBtn" class="btn btn-outline-success">
                                Pay Now
                                <small>
                                    10.00
                                </small>
                            </button>
                        </div>
                        <div class="mt-3 d-grid gap-2 mx-auto">
                            <button type="button" id="payCancelBtn" class="btn btn-outline-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div

@endsection

