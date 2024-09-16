@extends('layouts.admin-app')

@section('title', 'Admin Dashboard - Create Portofolio')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Create Portofolio</h4>

      {{-- include components message --}}
      @include('components._messages')

      <form action="{{ route('admin.portofolio.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="col-md-12">
            <div class="card mb-4">
              <h5 class="card-header">Form Create Portofolio</h5>

              <div class="card-body">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Title</label>
                  <input
                    type="text"
                    class="form-control"
                    id="exampleFormControlInput1"
                    name="title"
                    placeholder="Portofolio title.."
                    value="{{ old('title') }}"
                  />
                </div>

                <div class="mb-3">
                  <label for="defaultSelect" class="form-label">Default select</label>
                  <select id="defaultSelect" class="form-select" name="category_id">
                    <option>Default select</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                      @if (old('category') == $category->id)
                        selected
                      @endif
                    >
                      {{ $category->title }}
                    </option>
                  @endforeach
                  </select>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Images Upload</label>
                    <input class="form-control" type="file" id="formFile" name="image" multiple accept=".png, .jpg, .jpeg"/>
                    <span class="text-danger" style="font-size: 12px">max-files: 2 Mb</span>
                </div>
              
                <div>
                  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Description..">{{ old('description') }}</textarea>
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