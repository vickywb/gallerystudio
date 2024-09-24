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
                            @foreach ($blogs as $blog)
                                @foreach ($blog->blogImages as $blogImage)
                                <div class="blog-thumbnail mb-50">
                                    <img src="{{ $blogImage->showFile ?? asset('frontend/img/no-image.png') }}" alt="">
                                </div>
                                <div class="blog-content">
                                    <h2>{{ $blog->title }}</h2>
                                    <a href="#" class="post-date">Updated {{ $blog->created_at->diffForHumans() }}</a>
                                    <a href="#" class="post-author">By Admin</a>
                                    <p>{!! Str::words($blog->description, 50, '...') !!}</p>
                                    <a href="#" class="btn studio-btn mb-5"><img src="img/core-img/logo-icon.png" alt=""> Read More</a>
                                </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="Page navigation" class="pagination-area mb-100">
                            <ul class="pagination justify-content-center">
                                {{ $blogs->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End -->
    
        <!-- Footer Area Start -->
        @include('frontend.components.footer-section')
        <!-- Footer Area End -->
@endsection