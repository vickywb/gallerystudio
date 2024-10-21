@extends('layouts.app')

@section('title', 'Blog ' . $blog->title .' Detail')
@section('content')
        <!-- Blog Area Start -->
        <section class="blog-area section_padding_100 mt-100">
            <div class="container">
                <div class="row justify-content-center">
              
                    <!-- Single Blog Area -->
                    <div class="col-10">
                        <div class="single-blog-area text-center mb-100 wow fadeInUpBig" data-wow-delay="100ms" data-wow-duration="1s">
                                @foreach ($blog->blogImages as $blogImage)
                                <div class="blog-thumbnail mb-50">
                                    <img src="{{ $blogImage->showFile ?? asset('frontend/img/no-image.png') }}" alt="blog-image">
                                </div>
                                <div class="blog-content">
                                    <h2>{{ $blog->title }}</h2>
                                    <a class="post-date">Updated {{ $blog->created_at->diffForHumans() }}</a>
                                    <a class="post-author">By Admin</a>
                                    <p>{!! Str::words($blog->description) !!}</p>
                                    <a href="{{ route('blog') }}" class="btn studio-btn mb-5"><img src="img/core-img/logo-icon.png" alt="">Back</a>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
               
            </div>
        </section>
        <!-- Blog Area End -->
    
        <!-- Footer Area Start -->
        @include('frontend.components.footer-section')
        <!-- Footer Area End -->
@endsection

