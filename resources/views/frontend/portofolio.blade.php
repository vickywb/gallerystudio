@extends('layouts.app')

@section('title', 'Portofolio')
@section('content')
    
    <!-- Project Area Start -->
    <div class="gallery_area clearfix">
        <div class="container-fluid clearfix">
            <div class="gallery_menu">
                <div class="portfolio-menu">
                    <button class="active btn" type="button" data-filter="*">All</button>
                    <button class="btn" type="button" data-filter=".portraits">Portraits</button>
                    <button class="btn" type="button" data-filter=".weddings">Weddings</button>
                    <button class="btn" type="button" data-filter=".studio">Studio</button>
                    <button class="btn" type="button" data-filter=".fashion">Fashion</button>
                    <button class="btn" type="button" data-filter=".life">Lifestyle</button>
                </div>
            </div>

            <div class="row portfolio-column">

                <!-- Single Item -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 column_single_gallery_item portraits life">
                    <img src="{{ asset('frontend/img/bg-img/p1.jpg') }}" alt="">
                    <div class="hover_overlay">
                        <a class="gallery_img" href="{{ asset('frontend/img/bg-img/p1.jpg') }}"><i class="fa fa-eye"></i></a>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 column_single_gallery_item weddings">
                    <img src="{{ asset('frontend/img/bg-img/p2.jpg') }}" alt="">
                    <div class="hover_overlay">
                        <a class="gallery_img" href="{{ asset('frontend/img/bg-img/p2.jpg') }}"><i class="fa fa-eye"></i></a>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 column_single_gallery_item portraits">
                    <img src="{{ asset('frontend/img/bg-img/p3.jpg') }}" alt="">
                    <div class="hover_overlay">
                        <a class="gallery_img" href="{{ asset('frontend/img/bg-img/p3.jpg') }}"><i class="fa fa-eye"></i></a>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 column_single_gallery_item weddings life">
                    <img src="{{ asset('frontend/img/bg-img/p4.jpg') }}" alt="">
                    <div class="hover_overlay">
                        <a class="gallery_img" href="{{ asset('frontend/img/bg-img/p4.jpg') }}"><i class="fa fa-eye"></i></a>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 column_single_gallery_item weddings">
                    <img src="{{ asset('frontend/img/bg-img/p5.jpg') }}" alt="">
                    <div class="hover_overlay">
                        <a class="gallery_img" href="{{ asset('frontend/img/bg-img/p5.jpg') }}"><i class="fa fa-eye"></i></a>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 column_single_gallery_item portraits">
                    <img src="{{ asset('frontend/img/bg-img/p6.jpg') }}" alt="">
                    <div class="hover_overlay">
                        <a class="gallery_img" href="{{ asset('frontend/img/bg-img/p6.jpg') }}"><i class="fa fa-eye"></i></a>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 column_single_gallery_item studio">
                    <img src="{{ asset('frontend/img/bg-img/p7.jpg') }}" alt="">
                    <div class="hover_overlay">
                        <a class="gallery_img" href="{{ asset('frontend/img/bg-img/p7.jpg') }}"><i class="fa fa-eye"></i></a>
                    </div>
                </div>

                <!-- Single Item -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 column_single_gallery_item studio life">
                    <img src="{{ asset('frontend/img/bg-img/p8.jpg') }}" alt="">
                    <div class="hover_overlay">
                        <a class="gallery_img" href="{{ asset('frontend/img/bg-img/p8.jpg') }}"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center mt-70">
                    <a href="#" class="btn studio-btn"><img src="{{ asset('frontend/img/core-img/logo-icon.png') }}" alt=""> Load More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Project Area End -->

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