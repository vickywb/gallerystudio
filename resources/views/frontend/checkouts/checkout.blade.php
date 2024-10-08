@extends('layouts.checkout-app')

@section('title', 'Checkout Package')
@section('content')

    <!-- Start Pricing -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 col-12 mb-lg-0 mb-">
                <div class="card" style="box-shadow: 0 .1875rem .5rem 0 rgba(34,48,62,.1); -bs-card-spacer-y: 1.5rem;">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <h3>Checkout Detail</h3>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                              <div class="card pl-3 pr-3" style="box-shadow: 0 .1875rem .5rem 0 rgba(34,48,62,.1">
                                <div class="row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <h4>Customer Detail</h4>

                                        <form action="#">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Name *</label>
                                                <input
                                                    type="text"
                                                    name="name"
                                                    id=""
                                                    class="form-control"
                                                    placeholder="Your Full Name"
                                                />
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Email *</label>
                                                <input
                                                    type="email"
                                                    name="email"
                                                    id=""
                                                    class="form-control"
                                                    placeholder="Your Email"
                                                />
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Phone Number *</label>
                                                <input
                                                    type="number"
                                                    name="phone_number"
                                                    id=""
                                                    class="form-control"
                                                    placeholder="Your Phone Number"
                                                />
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">City *</label>
                                                <input
                                                    type="text"
                                                    name="city"
                                                    id=""
                                                    class="form-control"
                                                    placeholder="Your City"
                                                />
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Address *</label>
                                                <input
                                                    type="text"
                                                    name="address1"
                                                    id=""
                                                    class="form-control"
                                                    placeholder="Your Address"
                                                />
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Second Address (optional)</label>
                                                <input
                                                    type="text"
                                                    name="address2"
                                                    id=""
                                                    class="form-control"
                                                    placeholder="Your Second address"
                                                />
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <h4>Transaction Detail</h4>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Package Photo Shoot</label>
                                            <input
                                                type="text"
                                                name=""
                                                id=""
                                                class="form-control"
                                                placeholder=""
                                                disabled
                                                value="{{ $package->slug }}"
                                            />
                                        </div>


                                        <div class="mb-3">
                                            <label for="" class="form-label">Package Person</label>
                                            <input
                                                type="text"
                                                name=""
                                                id=""
                                                class="form-control"
                                                placeholder=""
                                                disabled
                                                value="{{ $package->packageDetail->person }}"
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Package Session Photo</label>
                                            <input
                                                type="text"
                                                name=""
                                                id=""
                                                class="form-control"
                                                placeholder=""
                                                disabled
                                                value="{{ $package->packageDetail->session }}"
                                            />
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Package Edited Photo</label>
                                            <input
                                                type="text"
                                                name=""
                                                id=""
                                                class="form-control"
                                                placeholder=""
                                                disabled
                                                value="{{ $package->packageDetail->edited_photo }}"
                                            />
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Package Digital Photo</label>
                                            <input
                                                type="text"
                                                name=""
                                                id=""
                                                class="form-control"
                                                placeholder=""
                                                disabled
                                                value="{{ $package->packageDetail->session }}"
                                            />
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Package Printed Photo</label>
                                            <input
                                                type="text"
                                                name=""
                                                id=""
                                                class="form-control"
                                                placeholder=""
                                                disabled
                                                value="{{ $package->packageDetail->printed_photo }}"
                                            />
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Package Studio</label>
                                            <input
                                                type="text"
                                                name=""
                                                id=""
                                                class="form-control"
                                                placeholder=""
                                                disabled
                                                value="{{ $package->packageDetail->studio }}"
                                            />
                                        </div>

                                    </div>
                                   </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing -->

@endsection