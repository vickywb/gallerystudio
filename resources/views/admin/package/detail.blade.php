@extends('layouts.admin-app')

@section('title', 'Admin Dashboard - Package Index')
@section('content')

    <div class="content">
        <div class="container flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Index /</span> Detail Package</h4>

            {{-- include message alert --}}
            @include('components._messages')

            <div class="row">
                <div class="col-xl-12 d-flex flex-row-reverse">
                    <form action="">
                        <button class="btn btn-outline-success mb-2"><a href="">Create Detail Package</a></button>
                    </form>
                </div>
            </div>
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Package Detail - {{ $package->title }}</h5>
                
                <div class="card-body">
                    <div class="fw-bold fs-6 pe-2">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex flex-wrap align-items-center text-gray-900 text-hover-primary me-5 mb-2">
                                    <div class="me-5">
                                        Person: <span class="text-gray-700 fs-7 fw-bolder">{{ $package->packageDetail->person ?? '-' }} People</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap align-items-center text-gray-900 text-hover-primary me-5 mb-2">
                                    <div class="me-5">
                                        Session: <span class="text-gray-700 fs-7 fw-bolder">{{ $package->packageDetail->session ?? '-' }} Minute</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap align-items-center text-gray-900 text-hover-primary me-5 mb-2">
                                    <div class="me-5">
                                        Photo Shoot: <span class="text-gray-700 fs-7 fw-bolder">{{ $package->packageDetail->photo_shoot ?? '-' }}x</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap align-items-center text-gray-900 text-hover-primary me-5 mb-2">
                                    <div class="me-5">
                                        Studio: <span class="text-gray-700 fs-7 fw-bolder">{{ $package->packageDetail->studio ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-wrap align-items-center text-gray-900 text-hover-primary me-5 mb-2">
                                    <div class="me-5">
                                        Edited Photo: <span class="text-gray-700 fs-7 fw-bolder">{{ $package->packageDetail->edited_photo ?? '-' }}</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap align-items-center text-gray-900 text-hover-primary me-5 mb-2">
                                    <div class="me-5">
                                        Digital Photo: <span class="text-gray-700 fs-7 fw-bolder">{{ $package->packageDetail->digital_photo ?? '-' }}</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap align-items-center text-gray-900 text-hover-primary me-5 mb-2">
                                    <div class="me-5">
                                        Printed Photo: <span class="text-gray-700 fs-7 fw-bolder">{{ $package->packageDetail->printed_photo ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection