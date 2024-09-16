@extends('layouts.admin-app')

@section('title', 'Admin Dashboard - Category Index')
@section('content')

    @include('admin.components.navbar')

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Index /</span> Category Index</h4>

            {{-- include message alert --}}
            @include('components._messages')

            <!-- Basic Bootstrap Table -->
            <div class="card">
              <h5 class="card-header">Category Index</h5>
              <div class="table-responsive text-nowrap text-center">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Title</th>
                      <th>Slug</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  @foreach ($categories as $category)
                  <tbody class="table-border-bottom-0">
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $category->title }}</td>
                      <td>{{ $category->slug }}</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('admin.category.edit', $category) }}"
                              ><i class="bx bx-edit-alt me-2"></i> Edit</a
                            >
                            <a class="dropdown-item" href="{{ route('admin.category.delete', $category) }}"
                              ><i class="bx bx-trash me-2"></i> Delete</a
                            >
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