@extends('layouts.admin-app')

@section('title', 'Admin Dashboard - Transaction Index')
@section('content')

    @include('admin.components.navbar')

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Index /</span> Transaction Index</h4>

            {{-- include message alert --}}
            @include('components._messages')
              
            <!-- Search -->
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6">
                  <div class="card mb-2">
                      <form method="get">
                            <div class="nav-item d-flex align-items-center">
                            <input
                                type="text"
                                class="form-control border-0 shadow-none"
                                placeholder="Search Title"
                                aria-label="Search Title"
                                name="search_title" value="{{ request('title') }}"/>
                                <button class="btn btn-outline-light-secondary">
                                  <i class="bx bx-search fs-4 lh-0"></i>
                                </button>
                            </div>
                      </form>
                  </div>
                </div>
    
                <div class="col-md-6">
                  <div class="card mb-2">
                      <form method="get">
                            <div class="nav-item d-flex align-items-center">
                            <input
                                type="text"
                                class="form-control border-0 shadow-none"
                                placeholder="Search Category"
                                aria-label="Search Category"
                                name="search_category" value="{{ request('category') }}"/>
                                <button class="btn btn-outline-light-secondary">
                                  <i class="bx bx-search fs-4 lh-0"></i>
                                </button>
                            </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Search -->
            
            <!-- Basic Bootstrap Table -->
            <div class="card">
              <h5 class="card-header">User Index</h5>
              <div class="table-responsive text-nowrap text-center">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  @foreach ($transactions as $transaction)
                  <tbody class="table-border-bottom-0">
                    <tr>
                      <td>{{ $transaction->id }}</td>
                      <td>{{ $transaction->name }}</td>
                      <td>{{ $transaction->email }}</td>
                      <td>{{ $transaction->name }}</td>
                      <td>
                        <img src="{{ asset('backend/img/no-image.png') }}" alt="Avatar" class="rounded-circle m-0" style="width: 75px; height: 75px" />
                      </td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href=""
                              ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <form action="" method="post">
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
              {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>
    
@endsection