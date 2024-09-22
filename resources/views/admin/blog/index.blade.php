@extends('layouts.admin-app')

@section('title', 'Admin Dashboard - Blog Index')
@section('content')

    @include('admin.components.navbar')

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Index /</span> Blog Index</h4>
            
            {{-- include message alert --}}
            @include('components._messages')

            <!-- Basic Bootstrap Table -->
            <div class="card">
              <h5 class="card-header">About Index</h5>
              <div class="table-responsive text-nowrap text-center">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  @foreach ($blogs as $blog)
                  <tbody class="table-border-bottom-0">
                    <tr>
                      <th>{{ $loop->iteration }}</th>
                      <td>{{ $blog->title }}</td>
                      <td>{!! Str::words($blog->description, 15) !!}</td>
                      <td>
                        <img src="{{ $blog->firstImage->file->showFile ?? asset('backend/img/no-image.png') }}" alt="Avatar" class="rounded-circle m-0" style="width: 75px; height: 75px" />
                      </td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('admin.blog.edit', $blog) }}"
                              ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <form action="{{ route('admin.blog.delete', $blog) }}" method="post">
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
            <div class="pagination justify-content-center mt-5">
              {{ $blogs->links() }}
            </div>
        </div>
    </div>
    
@endsection