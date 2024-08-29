@extends('layouts.admin-app')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Create About</h4>

        <div class="col-md-12">
            <div class="card mb-4">
              <h5 class="card-header">Form Create About</h5>
              <div class="card-body">

                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Title</label>
                  <input
                    type="text"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="About Me.."
                  />
                </div>

                <div class="mb-3">
                  <label for="defaultSelect" class="form-label">Default select</label>
                  <select id="defaultSelect" class="form-select">
                    <option>Default select</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Images Upload</label>
                    <input class="form-control" type="file" id="formFile" />
                    <span class="text-danger" style="font-size: 12px">max-files: 2 Mb</span>
                </div>
               
                <div>
                  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description About Me.."></textarea>
                </div>
              </div>
              <div class="row">
                <div class="d-flex justify-content-end px-5 py-">
                    <button type="submit" class="btn btn-primary mb-3">Save</button>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection