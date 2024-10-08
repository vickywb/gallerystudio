@extends('layouts.admin-app')

@section('title', 'Admin Dashboard - Package Index')
@section('content')

    @include('admin.components.navbar')

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Index /</span> Package Index</h4>

            {{-- include message alert --}}
            @include('components._messages')

            <!-- Basic Bootstrap Table -->
            <div class="card">
              <h5 class="card-header">Package Index</h5>
              <div class="table-responsive text-nowrap text-center">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Package Item</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  @foreach ($packages as $package)
                  <tbody class="table-border-bottom-0">
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $package->title }}</td>
                      <td>Rp. {{ number_format($package->price, 2, ',', '.')  }}</td>
                      <td>
                        <ul>
                            <li>{{ $package->packageDetail->person ?? '-' }} Person</li>
                            <li>{{ $package->packageDetail->session ?? '-' }} Minute</li>
                            <li>{{ $package->packageDetail->photo_shoot ?? '-' }} Photo Shoot</li>
                            <li>{{ $package->packageDetail->edited_photo ?? '-' }} Edited Photo</li>
                            <li>{{ $package->packageDetail->digital_photo ?? '-' }} Digital Photo</li>
                            <li>{{ $package->packageDetail->printed_photo ?? '-' }} Printed Photo</li>
                            <li>{{ $package->packageDetail->studio ?? '-' }} Studio</li>
                        </ul>
                      </td>
                      <td>{!! Str::words($package->description, 10) !!}</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('admin.package.detail', $package) }}"
                            ><i class="bx bx-detail me-1"></i> Detail</a
                          >
                            <a class="dropdown-item" href="{{ route('admin.package.edit', $package) }}"
                              ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <form action="{{ route('admin.package.delete', $package) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button
                                  onclick="return confirm('Are you sure to delete?')"
                                  type="submit"
                                  class="dropdown-item"
                              >
                              <i class="bx bx-trash me-1"></i> Delete
                              </button>
                            </form>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div>
        </div>
    </div>
    
@endsection