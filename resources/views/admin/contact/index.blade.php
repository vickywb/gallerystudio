@extends('layouts.admin-app')

@section('title', 'Admin Dashboard - Contact Index')
@section('content')

    @include('admin.components.navbar')

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Index /</span> Contact Index</h4>

            {{-- include message alert --}}
            @include('components._messages')

            <!-- Search -->
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-4">
                  <div class="card mb-2">
                      <form method="get">
                            <div class="nav-item d-flex align-items-center">
                            <input
                                type="text"
                                class="form-control border-0 shadow-none"
                                placeholder="Search Name"
                                aria-label="Search Name"
                                name="search_name" value="{{ request('name') }}"/>
                                <button class="btn btn-outline-light-secondary">
                                  <i class="bx bx-search fs-4 lh-0"></i>
                                </button>
                            </div>
                      </form>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card mb-2">
                      <form method="get">
                            <div class="nav-item d-flex align-items-center">
                            <input
                                type="text"
                                class="form-control border-0 shadow-none"
                                placeholder="Search Email"
                                aria-label="Search Email"
                                name="search_email" value="{{ request('email') }}"/>
                                <button class="btn btn-outline-light-secondary">
                                  <i class="bx bx-search fs-4 lh-0"></i>
                                </button>
                            </div>
                      </form>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card mb-2">
                      <form method="get">
                            <div class="nav-item d-flex align-items-center">
                            <input
                                type="text"
                                class="form-control border-0 shadow-none"
                                placeholder="Search Date"
                                aria-label="Search Date"
                                name="search_date" value="{{ request('date') }}"/>
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
              <h5 class="card-header">About Index</h5>
              <div class="table-responsive text-nowrap text-center">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th>Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  @foreach ($contacts as $contact)
                  <tbody class="table-border-bottom-0">
                    <tr>
                      <th>{{ $loop->iteration }}</th>
                      <td>{{ $contact->name }}</td>
                      <td>{{ $contact->email }}</td>
                      <td>{{ $contact->subject }}</td>
                      <td>{{ $contact->message }}</td>
                      <td>{{ $contact->created_at->format('d-m-Y : H i') }}</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <form action="{{ route('admin.contact.delete', $contact) }}" method="post">
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
              {{ $contacts->links() }}
            </div>
        </div>
    </div>
    
@endsection