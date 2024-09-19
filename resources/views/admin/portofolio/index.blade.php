@extends('layouts.admin-app')

@section('title', 'Admin Dashboard - Portofolio Index')
@section('content')

    @include('admin.components.navbar')

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Index /</span> Portofolio Index</h4>

            {{-- include message alert --}}
            @include('components._messages')
            
            <!-- Basic Bootstrap Table -->
            <div class="card">
              <h5 class="card-header">Portofolio Index</h5>
              <div class="table-responsive text-nowrap text-center">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Category</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  @foreach ($portofolios as $portofolio)
                  <tbody class="table-border-bottom-0">
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $portofolio->category->title }}</td>
                      <td>{{ $portofolio->title }}</td>
                      <td>{!! Str::words($portofolio->description, 15) !!}</td>
                      <td>
                        <img src="{{ $portofolio->firstImage->file->showFile ?? asset('backend/img/no-image.png')}}" alt="Avatar" class="rounded-circle m-0" style="width: 75px; height: 75px" />
                      </td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('admin.portofolio.edit', $portofolio) }}"
                              ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <form action="{{ route('admin.portofolio.delete', $portofolio) }}" method="post">
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