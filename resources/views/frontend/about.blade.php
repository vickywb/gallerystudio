@extends('layouts.app')

@section('title', 'About')
@section('content')
    
    <!-- About Me Area Start -->
    <section class="about-me-area mt-100 section_padding_100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($abouts as $about)

                <div class="col-10">
                    <div class="about-me-thumb text-center">
                        <img src="{{ $about->file->showFile ?? asset('frontend/img/bg-img/about-me.jpg') }}" alt="profile-image">
                    </div>
                </div>
                
                <div class="col-10">
                    <div class="about-content mt-100 mb-100">
                        <span></span>
                        <h2 class="text-center">What can I tell you about me?</h2>
                        <p class="text-start">{!! $about->description !!}</p>
                    </div>
                </div>

                @endforeach

                <div class="col-10">
                    <div class="text-center mb-5">
                        <h3>Category of Photography</h3>
                    </div>
                    <div class="row">
                        
                        <div class="col-12 col-md-4">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <img src="{{ asset('frontend/img/core-img/heart.png') }}" alt="">
                                <h5>Potrait Photography</h5>
                                <p>Capturing individuals or groups to highlight personality or expression.</p>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.9s">
                                <img src="{{ asset('frontend/img/core-img/video-camera.png') }}" alt="">
                                <h5>Street Photography</h5>
                                <p>Candid moments of everyday life in public places.</p>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.9s">
                                <img src="{{ asset('frontend/img/core-img/video-camera.png') }}" alt="">
                                <h5>Wildlife Photography</h5>
                                <p>Documenting animals in their natural habitats.</p>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.9s">
                                <img src="{{ asset('frontend/img/core-img/video-camera.png') }}" alt="">
                                <h5>Event Photography</h5>
                                <p>Covering live events such as weddings, concerts, or corporate functions.</p>
                            </div>
                        </div>
                     
                        <div class="col-12 col-md-4">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.4s">
                                <img src="{{ asset('frontend/img/core-img/photo-camera.png') }}" alt="">
                                <h5>Landscape Photography</h5>
                                <p>Focusing on natural or urban environments, like mountains, oceans, or cityscapes.</p>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.9s">
                                <img src="{{ asset('frontend/img/core-img/video-camera.png') }}" alt="">
                                <h5>Fashion Photography</h5>
                                <p>Showcasing clothing, accessories, and models, typically for editorial or commercial use.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Me Area End -->
    
    <!-- Footer Area Start -->
    @include('frontend.components.footer-section')
    <!-- Footer Area End -->
@endsection   