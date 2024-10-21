@extends('layouts.checkout-app')

@section('title', 'Payment')
@section('content')
<div class="container py-5">
    
    <div class="wrapping-content text-center mt-5 mb-3">
        <h4>Thankyou for buying our Package!!</h4>
        <h5 style="font-size: 16px">Please Click the Payment Button below.</h5>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Checkout Now!
        </button>
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-size: 16px">Invoice: {{ $transaction->invoice_id }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="{{ $transaction->invoice_url }}" frameborder="0" height="500px" width="100%"></iframe>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
        <!-- Modal -->
        
        <div class="image-content mt-5">
            <img src="{{ asset('frontend/img/shoppingcart.png') }}" alt="">
        </div>
    </div>
    
</div>
@endsection


