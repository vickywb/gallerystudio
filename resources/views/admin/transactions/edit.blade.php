@extends('layouts.admin-app')

@section('title', 'Admin Dashboard - Edit Transaction')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Edit Transaction</h4>

      {{-- include message alert --}}
      @include('components._messages')

      <form action="{{ route('admin.transaction.update', $transaction) }}" method="post">
        @csrf
        @method('PATCH')

        <div class="col-md-12">
          <div class="card mb-4">
            <h5 class="card-header">Form Edit Transaction</h5>

            <div class="card-body">
                
            <div class="mb-3">
                <label for="defaultSelect" class="form-label">Current Status</label>
                <select id="defaultSelect" class="form-select" name="status">
                  <option disabled>{{ $transaction->status }}</option>
                  @foreach ($statusMaps as $statusMap)
                    <option value="{{ $statusMap }}" 
                      @if (old('status', $transaction->status) == $statusMap )
                        selected
                      @endif
                    >
                      {{ $statusMap }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row">
              <div class="d-flex justify-content-end px-5 py-">
                  <button type="submit" class="btn btn-primary mb-3">Save</button>
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
@endsection
