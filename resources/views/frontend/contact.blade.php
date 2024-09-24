@extends('layouts.app')

@section('title', 'Contact')
@section('content')

    <!-- Contact Section -->
    <section class="contact-area section_padding_100 mt-100">
        <div class="container">

            {{-- Alert Message --}}
            @session('success')
            <div class="alert alert-success" role="alert" id="alertMessage">
                <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                    <h4 class="mb-2 text-light text-center">Success</h4>
                </div>
                <div class="modal-body text-center">
                    {{ $value }}
                </div>
            </div>
            @endsession
            
            {{-- content heading --}}
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="contact-heading-text text-center mb-100">
                        <span></span>
                        <h2>Please get in touch</h2>
                        <p>
                            Questions and comments are important to us, so please use the form below to contact our crew. 
                            We will reply as soon as possible. Guarantee a response within 24 hours!
                        </p>
                    </div>
                </div>

                <!-- Contact Form Area -->
                <div class="col-10">
                    <div class="contact-form-area">
                        <form action="{{ route('contact.store') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name *" required>
                                </div>

                                <div class="col-12 col-md-4">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email *" required>
                                </div>

                                <div class="col-12 col-md-4">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                </div>

                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message *" required></textarea>
                                </div>

                                <div class="col-12 col-md-3 offset-md-5">
                                    <div class="input-group">
                                        <div id="captcha-img" alt="captcha-img">
                                            {!! Captcha::img('math') !!}
                                        </div>

                                       <button type="button" class="btn btn-outline-secondary btn-sm" id="refresh" style="margin-left: 2px"><i class="fa fa-refresh"></i></button>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-2 offset-md-5">
                                    <input type="text" name="captcha" class="form-control @error('errors') is-invalid @enderror" placeholder="Input Captcha" required>
                                    @error('errors') 
                                        <div class="invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                </div>
                                   
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn studio-btn mt-3"><img src="{{ asset('frontend/img/core-img/logo-icon.png') }}" alt=""> Send</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->

    <!-- Google Maps -->
    <div class="map-area">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-10">
                    <div class="googleMaps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.28228565663!2d106.74711727577623!3d-6.229569453682308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta!5e0!3m2!1sen!2sid!4v1724063125125!5m2!1sen!2sid" 
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    </div>
                  
                    <!-- Contact Info -->
                    <div class="contact-core-info d-flex align-items-center wow fadeInLeftBig" data-wow-delay="1s" data-wow-duration="1000ms">
                        <div class="contactInfo">
                            <img src="{{ asset('frontend/img/core-img/logo.png') }}" alt="">
                            <!-- Single Footer Content -->
                            <div class="single-footer-content">
                                <img src="{{ asset('frontend/img/core-img/map.png') }}" alt="">
                                <a href="#">Blvd Libertad, 34 m05200 Arévalo</a>
                            </div>
                            <!-- Single Footer Content -->
                            <div class="single-footer-content">
                                <img src="{{ asset('frontend/img/core-img/smartphone.png') }}" alt="">
                                <a href="#">0034 37483 2445 322</a>
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
        </div>
    </div>
    <!-- End Google Maps -->

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
    
@push('script')
    <script type="text/javascript">
        
        $(document).ready(function () {
            $('#refresh').click(function () {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('captcha.refresh') }}',
                    success: function(data) {
                        $('#captcha-img').html(data.captcha);
                    }
                });
            });
        })
    </script>
@endpush
