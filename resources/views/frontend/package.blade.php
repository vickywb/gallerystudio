@extends('layouts.app')

@section('title', 'Package')
@section('content')

    <!-- Start Pricing -->
    <div class="container py-5">
        <div class="col-md-12 text-center py-5">
            <h1 class="h2">
                Our Package
            </h1>
            <p>Hey There!, we have the best package for you to choose.</p>
        </div>

        <div class="row">

            @foreach ($packages as $package)
            
                @if ($package->title == 'Gold')

                <div class="col-md-4 pt-3">
                    <div class="pricing-table card h-100 py-5">
                        <div class="card-body text-center align-self-center p-md-0">
                            <h2 class="pricing-table-heading h5">{{ $package->title }}</h2>
                            <p>Rp. {{ number_format($package->price, 2, ',', '.')  }}</p>
                            <p class="text-dark">{!! $package->description !!}</p>
                            <div class="pricing-table-footer pt-5 pb-2">
                                <a href="#" class="btn px-4 btn-outline-primary">Get Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                @else

                <div class="col-md-4 pb-5 mt-5">
                    <div class="pricing-table card h-100 py-5">
                        <div class="card-body text-center align-self-center p-md-0">
                            <h2 class="pricing-table-heading h5">{{ $package->title }}</h2>
                            <p>Rp. {{ number_format($package->price, 2, ',', '.')  }}</p>
                            <p class="text-dark text-start">{!! $package->description !!}</p>
                            <div class="pricing-table-footer pt-5 pb-2">
                                <a href="#" class="btn px-4 btn-outline-primary">Get Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endif
           
            @endforeach
          
        </div>
    </div>
    <!-- End Pricing -->
    
    <!-- Footer Area Start -->
    @include('frontend.components.footer-section')
    <!-- Footer Area End -->
@endsection