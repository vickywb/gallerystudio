@extends('layouts.app')

@section('title', 'Portofolio')
@section('content')
    
    <!-- Project Area Start -->
    <div class="gallery_area clearfix">
        <div class="container-fluid clearfix">
            <div class="gallery_menu">
               <div class="portfolio-menu">
                <button class="active btn" type="button" data-filter="*">All</button>
                @foreach ($categories as $category)
                    <button class="btn" type="button" data-filter=".{{ $category->title }}">{{ $category->title }}</button>
                @endforeach
                </div>
            </div>

            <div class="row portfolio-column">
                @foreach ($portofolios as $key => $portofolio)
                    @foreach ($portofolio->portofolioImages as $image)
            
                    <!-- Single Item -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 column_single_gallery_item {{ $portofolio->category->title }}">
                        <img src="{{ $image->showFile ?? asset('frontend/img/no-image.png') }}" alt="portofolio-image">
                        <div class="hover_overlay">
                            <a class="gallery_img" href="{{ $image->showFile ?? asset('frontend/img/no-image.png') }}"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    
                    @endforeach
                @endforeach
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
    @include('frontend.components.footer-section')
    <!-- Footer Area End -->

@endsection