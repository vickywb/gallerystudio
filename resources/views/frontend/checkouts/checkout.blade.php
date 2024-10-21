@extends('layouts.checkout-app')

@section('title', 'Checkout Package')
@section('content')

    <!-- Start Pricing -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="row justify-content-center">
                    <h3>Checkout Detail</h3>
                </div>
            <form action="{{ route('checkout.package.store', $package->slug) }}" method="post">
                @csrf
           
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="card pl-3 pr-3" style="box-shadow: 0 .1875rem .5rem 0 rgba(34,48,62,.1">

                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Name *</label>
                                                <input
                                                    type="text"
                                                    name="name"
                                                    id="name"
                                                    class="form-control"
                                                    placeholder="Your Full Name"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Email *</label>
                                                <input
                                                    type="email"
                                                    name="email"
                                                    id="email"
                                                    class="form-control"
                                                    placeholder="Your Email"
                                                />
                                            </div>
        
                                        </div>
                                    </div>
                                  
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Phone Number *</label>
                                                <input
                                                    type="tel"
                                                    name="phone_number"
                                                    id="phone_number"
                                                    class="form-control"
                                                    placeholder="+62"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">City *</label>
                                                <input
                                                    type="text"
                                                    name="city"
                                                    id="city"
                                                    class="form-control"
                                                    placeholder="Your City"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <div class="mb-3">
                                        <label for="" class="form-label">Address *</label>
                                        <input
                                            type="text"
                                            name="address1"
                                            id="address1"
                                            class="form-control"
                                            placeholder="Your Address"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Second Address (optional)</label>
                                        <input
                                            type="text"
                                            name="address2"
                                            id="address2"
                                            class="form-control"
                                            placeholder="Your Second address"
                                        />
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-2">
                        <div class="card pl-3 pr-3" style="box-shadow: 0 .1875rem .5rem 0 rgba(34,48,62,.1">
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <div class="col-md-12">
                                    Package Detail:
                                    <hr style="border-top: 1px solid #c9c7c7">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            Name:
                                        </div>
                                        <div class="col-md-4">
                                            {{ $package->title }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            Price:
                                        </div>
                                        <div class="col-md-2">
                                            Rp. {{ number_format($package->price, 2, ',', '.') }}
                                        </div>
                                    </div>
                                    <br>
                                    <hr style="border-top: 1px solid #c9c7c7"/>
                                    @php
                                    $totalPrice = 0;
                                    @endphp
                                    <div class="row">
                                        <div class="col-8">
                                            Total:
                                        </div>
                                        <div class="col-2">
                                        @php
                                        $totalPrice += $package->price;
                                        @endphp
                                        <input type="hidden" name="amount" id="amount" value="{{ $totalPrice }}">
                                        <div class="total-price">Rp. {{ number_format($totalPrice, 2, ',', '.') ?? 0 }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('checkout.package.store', $package->slug) }}">
                        <button class="btn btn-outline-success mt-4 py-2 pull-right">Checkout Now</button>
                    </a>
                </div>
            </form>

        </div>
    </div>
    <!-- End Pricing -->

@endsection

