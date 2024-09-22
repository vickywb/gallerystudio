@extends('layouts.app')

@section('title', 'Home')
@section('content')

    <!-- ***** Welcome Area Start ***** -->
    <section class="welcome-area">

        <div class="carousel slide h-100" data-ride="carousel" id="welcomeSlider">

            <!-- Carousel Inner -->
            <div class="carousel-inner h-100">
                @foreach ($portofolios as $key => $portofolio)
                    @foreach ($portofolio->portofolioImages as $image)
                    <div class="carousel-item h-100 bg-img {{ $key == 0 ? 'active' : '' }}" style="background-image: url('{{ $image->showFile ?? asset('frontend/img/no-image.png') }}')">
                        <div class="carousel-content h-100">
                            <div class="slide-text">
                                <h2>{{ $portofolio->title }}</h2>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>

            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                @foreach ($portofolios as $key => $portofolio)
                    @foreach ($portofolio->portofolioImages as $image)
                    <li data-target="#welcomeSlider" data-slide-to="0" class="bg-img {{ $key == 0 ? 'active' : '' }}" style="background-image: url('{{ $image->showFile ?? asset('frontend/img/no-image.png') }}');"></li>
                    @endforeach
                @endforeach
            </ol> 

        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

    <footer class="footer" style="mt-5">
        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
    </footer>
@endsection