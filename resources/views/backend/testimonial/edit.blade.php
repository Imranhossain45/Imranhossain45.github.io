@extends('layouts.backend.master')
@section('title', 'Edit Testimonial')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Testimonial</li>
          </ol>
        </nav>
        <h1 class="m-0">Testimonial</h1>
      </div>
    </div>
  </div>
  <section>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header">
              <h1 class="text-center">Edit Testimonial Info</h1>
            </div>
            <div class="card-body">
              <form action="{{ route('backend.testimonial.update', $testimonial->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group col-lg-4">
                  <label>Photo(850x565):</label>
                  <input type="file" name="photo" class="form-control" id="photoInput">
                  <img src="{{ $testimonial->photo }}" alt="">
                  <img id="previewImage" class="mt-3" src="#" alt="Preview"
                    style="display: none; max-width: 80px; max-height: 80px;">
                </div>
                <div class="row mt-3">
                  <div class="form-group">
                    <label for="">URL:</label>
                    <input type="text" name="url" class="form-control" value="{{ $testimonial->url }}">
                  </div>
                </div>

                {{-- <div class="row">
                  <div class="form-group col-lg-4">
                    <label>Name:</label>
                    <input type="text" name="name" class=" form-control" placeholder="Enter Name"
                      value="{{ $testimonial->name }}" required>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Designation:</label>
                    <input type="text" name="designation" class=" form-control" placeholder="Enter Designation"
                      value=" {{ $testimonial->designation }}">
                  </div>

                </div>

                <div class="row mt-3">
                  <div class="form-group">
                    <label for="">Description:</label>
                    <textarea name="description" id="description" class="form-control" rows="7">{{ $testimonial->description }}</textarea>
                  </div>
                </div> --}}
                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    CKEDITOR.replace('description');
  </script>
@endsection
