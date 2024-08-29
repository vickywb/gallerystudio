@extends('layouts.app')

@section('title', 'Home')
@section('content')

    <!-- ***** Welcome Area Start ***** -->
    <section class="welcome-area">
        <div class="carousel h-100 slide" data-ride="carousel" id="welcomeSlider">
            <!-- Carousel Inner -->
            <div class="carousel-inner h-100">

                <div class="carousel-item h-100 bg-img active" style="background-image: url({{ asset('frontend/img/bg-img/1.jpg') }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>01.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>

                <div class="carousel-item h-100 bg-img" style="background-image: url({{ asset('frontend/img/bg-img/2.jpg') }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>02.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url({{ asset('frontend/img/bg-img/3.jpg') }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>03.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url({{ asset('frontend/img/bg-img/4.jpg') }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>04.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url({{ asset('frontend/img/bg-img/5.jpg') }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>05.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url({{ asset('frontend/img/bg-img/6.jpg') }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>06.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url({{ asset('frontend/img/bg-img/7.jpg') }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>07.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url({{ asset('frontend/img/bg-img/8.jpg') }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>08.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url({{ asset('frontend/img/bg-img/9.jpg') }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>09.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url({{ asset('frontend/img/bg-img/10.jpg') }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>10.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url({{ asset('frontend/img/bg-img/11.jpg') }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>11.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url({{ asset('frontend/img/bg-img/12.jpg') }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>12.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url({{ asset('frontend/img/bg-img/13.jpg') }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>13.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#welcomeSlider" data-slide-to="0" class="active bg-img" style="background-image: url({{ asset('frontend/img/bg-img/1.jpg') }});"></li>
                <li data-target="#welcomeSlider" data-slide-to="1" class="bg-img" style="background-image: url({{ asset('frontend/img/bg-img/2.jpg') }});"></li>
                <li data-target="#welcomeSlider" data-slide-to="2" class="bg-img" style="background-image: url({{ asset('frontend/img/bg-img/3.jpg') }});"></li>
                <li data-target="#welcomeSlider" data-slide-to="3" class="bg-img" style="background-image: url({{ asset('frontend/img/bg-img/4.jpg') }});"></li>
                <li data-target="#welcomeSlider" data-slide-to="4" class="bg-img" style="background-image: url({{ asset('frontend/img/bg-img/5.jpg') }});"></li>
                <li data-target="#welcomeSlider" data-slide-to="5" class="bg-img" style="background-image: url({{ asset('frontend/img/bg-img/6.jpg') }});"></li>
                <li data-target="#welcomeSlider" data-slide-to="6" class="bg-img" style="background-image: url({{ asset('frontend/img/bg-img/7.jpg') }});"></li>
                <li data-target="#welcomeSlider" data-slide-to="7" class="bg-img" style="background-image: url({{ asset('frontend/img/bg-img/8.jpg') }});"></li>
                <li data-target="#welcomeSlider" data-slide-to="8" class="bg-img" style="background-image: url({{ asset('frontend/img/bg-img/9.jpg') }});"></li>
                <li data-target="#welcomeSlider" data-slide-to="9" class="bg-img" style="background-image: url({{ asset('frontend/img/bg-img/10.jpg') }});"></li>
                <li data-target="#welcomeSlider" data-slide-to="10" class="bg-img" style="background-image: url({{ asset('frontend/img/bg-img/11.jpg') }});"></li>
                <li data-target="#welcomeSlider" data-slide-to="11" class="bg-img" style="background-image: url({{ asset('frontend/img/bg-img/12.jpg') }});"></li>
                <li data-target="#welcomeSlider" data-slide-to="12" class="bg-img" style="background-image: url({{ asset('frontend/img/bg-img/13.jpg') }});"></li>
            </ol>
        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

    <footer class="footer" style="mt-5">
        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
    </footer>

@endsection