@extends('layouts.backend.master')
@section('title', 'Create Journalist')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Journalist</li>
          </ol>
        </nav>
        <h1 class="m-0">Journalist</h1>
      </div>
    </div>
  </div>
  <section>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header">
              <h1 class="text-center">Add Journalist Info</h1>
            </div>
            <div class="card-body">
              <form action="{{ route('backend.journalist.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                  <div class="form-group col-lg-8">
                    <label>Name:</label>
                    <input type="text" name="name" class=" form-control" placeholder="Enter Journalist Name"
                      value="{{ old('name') }}">
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Designation:</label>
                    <input type="text" name="designation" class="form-control" placeholder="Enter Designation"
                      value="{{ old('designation') }}">
                  </div>
                </div>
                <div class="row mt-3">

                  <div class=" form-group col-lg-6">
                    <label>Email:</label>
                    <input type="email" name="email" class=" form-control" placeholder="Enter Email"
                      value="{{ old('email') }}">
                  </div>

                  <div class="form-group col-lg-6">
                    <label>Phone:</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone"
                      value="{{ old('phone') }}">
                  </div>



                </div>

                <div class="row mt-3">

                  <div class=" form-group col-lg-6">
                    <label>Photo(3484*2531):</label>
                    <input type="file" name="photo" class=" form-control" id="photoInput"
                      value="{{ old('photo') }}">
                    <img id="previewImage" class="mt-3" src="#" alt="Preview"
                      style="display: none; max-width: 80px; max-height: 80px;">
                  </div>

                  <div class="form-group col-lg-6">
                    <label>Alter Text:</label>
                    <input type="text" name="alt_text" class="form-control" placeholder="Enter Alter Text"
                      value="{{ old('alt_text') }}">
                  </div>

                </div>
                <div class="row mt-3">
                  <div class="form-group col-lg-3">
                    <label>Facebook:</label>
                    <input type="text" name="facebook" class="form-control" placeholder="Facebook Link"
                      value="{{ old('facebook') }}">
                  </div>
                  <div class="form-group col-lg-3">
                    <label>Instagram:</label>
                    <input type="text" name="instagram" class="form-control" placeholder="Instagram Link"
                      value="{{ old('instagram') }}">
                  </div>
                  <div class="form-group col-lg-3">
                    <label>Twitter:</label>
                    <input type="text" name="twitter" class="form-control" placeholder="Twitter Link"
                      value="{{ old('twitter') }}">
                  </div>
                  <div class="form-group col-lg-3">
                    <label>Linkedin:</label>
                    <input type="text" name="linked_in" class="form-control" placeholder="Linkedin Link"
                      value="{{ old('linked_in') }}">
                  </div>
                </div>
                <div class=" form-group mt-3">
                  <label>Short Description:</label>
                  <textarea name="short_des" class="form-control " rows="7" placeholder="Enter Journalist Short Description">{{ old('short_des') }}</textarea>
                </div>
                <div class=" form-group mt-3">
                  <label>Description:</label>
                  <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Enter Journalist Description">{{ old('description') }}</textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    CKEDITOR.replace('editor');
  </script>
@endsection
