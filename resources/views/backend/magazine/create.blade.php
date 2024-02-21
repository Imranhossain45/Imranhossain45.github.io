@extends('layouts.backend.master')
@section('title', 'Create Magazine')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Magazine Info</li>
          </ol>
        </nav>
        <h1 class="m-0">Magazine Info</h1>
      </div>
    </div>
  </div>
  <section>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header">
              <h1 class="text-center">Create Magazine Info</h1>
            </div>
            <div class="card-body">
              <form action="{{ route('backend.magazine.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Name:</label>
                  <input type="text" name="name" class=" form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group mt-2">
                  <label>Photo1:</label>
                  <input type="file" name="photo1" class="form-control" id="photoInput">
                  <img id="previewImage" class="mt-3" src="#" alt="Preview"
                    style="display: none; max-width: 80px; max-height: 80px;">
                </div>
                <div class="form-group mt-2">
                  <label>URL1:</label>
                  <input type="text" name="url1" class="form-control" placeholder="Enter Url..." value="{{ old('url1') }}">
                </div>
                <div class="form-group mt-2">
                  <label>Photo2:</label>
                  <input type="file" name="photo2" class="form-control" id="photoInput1">
                  <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                    style="display: none; max-width: 80px; max-height: 80px;">
                </div>
                <div class="form-group mt-2">
                  <label>URL2:</label>
                  <input type="text" name="url2" class="form-control" placeholder="Enter Url..." value="{{ old('url2') }}">
                </div>
                <div class="form-group mt-2">
                  <label>Photo3:</label>
                  <input type="file" name="photo2" class="form-control" id="photoInput2">
                  <img id="previewImage2" class="mt-3" src="#" alt="Preview"
                    style="display: none; max-width: 80px; max-height: 80px;">
                </div>
                <div class="form-group mt-2">
                  <label>URL3:</label>
                  <input type="text" name="url3" class="form-control" placeholder="Enter Url..." value="{{ old('url3') }}">
                </div>
                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
