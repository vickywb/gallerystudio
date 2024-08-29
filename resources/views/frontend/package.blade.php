@extends('layouts.app')

@section('title', 'Package')
@section('content')

    <!-- Start pricing -->
    <div class="container py-5">
        <div class="col-md-12 text-center py-5">
            <h1 class="h2">
                Our Package
            </h1>
            <p>Hey There!, we have the best package for you to choose.</p>
        </div>

        <div class="row">
            <div class="col-md-4 pb-5 mt-5">
                <div class="pricing-table card h-100 py-5">
                    <div class="card-body text-center align-self-center p-md-0">
                        <h2 class="h5">Free Plan</h2>
                        <p>$0</p>
                        <ul class="text-dark">
                            <li><i class="bxs-circle me-2"></i>5 Users</li>
                            <li><i class="bx bxs-circle me-2"></i>2 TB space</li>
                            <li><i class="bx bxs-circle me-2"></i>Community Forums</li>
                            <li><i class=" me-2"></i>Email Support</li>
                        </ul>
                        <div class="pt-5">
                            <a href="#" class="btn px-4 btn-outline-primary">Get Now</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 pt-3">
                <div class="pricing-table card h-100 py-5">
                    <div class="card-body text-center align-self-center p-md-0">
                        <i class="py-3"></i>
                        <h2 class="pricing-table-heading h5">Standard Plan</h2>
                        <p>$120/Year</p>
                        <ul class="text-dar">
                            <li><i class="bx bxs-circle me-2"></i>25 to 99 Users</li>
                            <li><i class="bx bxs-circle me-2"></i>10 TB space</li>
                            <li><i class="bx bxs-circle me-2"></i>Source Files</li>
                            <li><i class="bx bxs-circle me-2"></i>Live Chat</li>
                        </ul>
                        <div class="pricing-table-footer pt-5 pb-2">
                            <a href="#" class="btn px-4 btn-outline-primary">Get Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-5 mt-5">
                <div class="pricing-table card h-100 py-5">
                    <div class="card-body text-center align-self-center p-md-0">
                        <h2 class="h5">Free Plan</h2>
                        <p>$0</p>
                        <ul class="text-dark">
                            <li class="bx bxs-circle me-2">5 Users</li>
                            <li><i class="bx bxs-circle me-2"></i>5 Users</li>
                            <li><i class="bx bxs-circle me-2"></i>2 TB space</li>
                            <li><i class="bx bxs-circle me-2"></i>Community Forums</li>
                            <li><i class="bx bxs-circle me-2"></i>Email Support</li>
                        </ul>
                        <div class="pt-5">
                            <a href="#" class="btn px-4 btn-outline-primary">Get Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->



    <!-- Footer Area Start -->
    <footer class="footer-area">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="footer-content h-100 d-md-flex align-items-center justify-content-between">
                        <!-- Single Footer Content -->
                        <div class="single-footer-content">
                            <img src="{{ asset('frontend/img/core-img/map.png') }}" alt="">
                            <a href="#">Jalan Jeruk no. 99, JAKARTA</a>
                        </div>
                        <!-- Single Footer Content -->
                        <div class="single-footer-content">
                            <img src="{{ asset('frontend/img/core-img/smartphone.png') }}" alt="">
                            <a href="#">+628 111 111 111</a>
                        </div>
                        <!-- Single Footer Content -->
                        <div class="single-footer-content">
                            <img src="{{ asset('frontend/img/core-img/envelope-2.png') }}" alt="">
                            <a href="#">hello@company.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->
@endsection