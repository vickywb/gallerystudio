@extends('layouts.app')

@section('title', 'Blog')
@section('content')
        <!-- Blog Area Start -->
        <section class="blog-area section_padding_100 mt-100">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Single Blog Area -->
                    <div class="col-10">
                        <div class="single-blog-area text-center mb-100 wow fadeInUpBig" data-wow-delay="100ms" data-wow-duration="1s">
                            <div class="blog-thumbnail mb-100">
                                <img src="{{ asset('frontend/img/bg-img/b1.jpg') }}" alt="">
                            </div>
                            <div class="blog-content">
                                <span></span>
                                <h2>10 Photography tips for begginers</h2>
                                <a href="#" class="post-date">Dec 01, 2017</a>
                                <a href="#" class="post-author">By James Smith</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vulputate id justo quis facilisis. Vestibulum id orci ligula. Sed tempor, nunc ut sodales pulvinar, mauris ante euismod magna, at elementum lectus leo sed enim. Praesent dictum suscipit tincidunt. Nulla facilisi. Aenean in mollis orci. Ut interdum vulputate ante a egestas. Pellentesque varius purus malesuada arcu semper vehicula. </p>
                                <a href="#" class="btn studio-btn"><img src="img/core-img/logo-icon.png" alt=""> Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog Area -->
                    <div class="col-10">
                        <div class="single-blog-area text-center mb-100 wow fadeInUpBig" data-wow-delay="100ms" data-wow-duration="1s">
                            <div class="blog-thumbnail mb-100">
                                <img src="{{ asset('frontend/img/bg-img/b2.jpg') }}" alt="">
                            </div>
                            <div class="blog-content">
                                <span></span>
                                <h2>The best online tutorials for photographers</h2>
                                <a href="#" class="post-date">Dec 01, 2017</a>
                                <a href="#" class="post-author">By James Smith</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vulputate id justo quis facilisis. Vestibulum id orci ligula. Sed tempor, nunc ut sodales pulvinar, mauris ante euismod magna, at elementum lectus leo sed enim. Praesent dictum suscipit tincidunt. Nulla facilisi. Aenean in mollis orci. Ut interdum vulputate ante a egestas. Pellentesque varius purus malesuada arcu semper vehicula. </p>
                                <a href="#" class="btn studio-btn"><img src="img/core-img/logo-icon.png" alt=""> Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog Area -->
                    <div class="col-10">
                        <div class="single-blog-area text-center mb-100 wow fadeInUpBig" data-wow-delay="100ms" data-wow-duration="1s">
                            <div class="blog-thumbnail mb-100">
                                <img src="{{ asset('frontend/img/bg-img/b3.jpg') }}" alt="">
                            </div>
                            <div class="blog-content">
                                <span></span>
                                <h2>Perfect light for street art</h2>
                                <a href="#" class="post-date">Dec 01, 2017</a>
                                <a href="#" class="post-author">By James Smith</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel lectus eu felis semper finibus ac eget ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vulputate id justo quis facilisis. Vestibulum id orci ligula. Sed tempor, nunc ut sodales pulvinar, mauris ante euismod magna, at elementum lectus leo sed enim. Praesent dictum suscipit tincidunt. Nulla facilisi. Aenean in mollis orci. Ut interdum vulputate ante a egestas. Pellentesque varius purus malesuada arcu semper vehicula. </p>
                                <a href="#" class="btn studio-btn"><img src="img/core-img/logo-icon.png" alt=""> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="Page navigation" class="pagination-area mb-100">
                            <ul class="pagination justify-content-center">
                                <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                                <li class="page-item"><a class="page-link" href="#">02.</a></li>
                                <li class="page-item"><a class="page-link" href="#">03.</a></li>
                                <li class="page-item"><a class="page-link" href="#">04.</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End -->
    
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