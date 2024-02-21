@extends('layouts.backend.master')
@section('title', 'Create Team')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Team</li>
                    </ol>
                </nav>
                <h1 class="m-0">Team</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Team Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.team.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <label>Name:</label>
                                        <input type="text" name="name" class=" form-control"
                                            placeholder="Enter Name" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Email:</label>
                                        <input type="email" name="email" class=" form-control"
                                            placeholder="Enter Email" value="{{ old('email') }}">
                                    </div>
                                    
                                    {{-- <div class="form-group">
                                        <label>Phone:</label>
                                        <input type="number" name="phone" class=" form-control"
                                            placeholder="Enter Name" value="{{ old('phone') }}" required>
                                    </div> --}}
                                    <div class="form-group col-lg-3">
                                        <label>Designation:</label>
                                        <input type="text" name="designation" class=" form-control"
                                            placeholder="Enter Designation" value="{{ old('designation') }}" >
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Photo(150x150):</label>
                                        <input type="file" name="photo" class="form-control" id="photoInput">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div> 
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <label>Facebook:</label>
                                        <input type="text" name="facebook" class=" form-control"
                                            placeholder="Enter facebook" value="{{ old('facebook') }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Linkedin:</label>
                                        <input type="text" name="linkedin" class=" form-control"
                                            placeholder="Enter Linkedin" value="{{ old('linkedin') }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Twitter:</label>
                                        <input type="text" name="twitter" class=" form-control"
                                            placeholder="Enter twitter" value="{{ old('twitter') }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Instagram:</label>
                                        <input type="text" name="instagram" class=" form-control"
                                            placeholder="Enter Instagram" value="{{ old('instagram') }}">
                                    </div>
                                </div>                                
                                <div class="row mt-3">
                                    <div class="form-group col-lg-6">
                                        <label for="">Short Description:</label>
                                        <textarea name="short_description" class="form-control" rows="7">{{ old('short_description') }}</textarea>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="">Description:</label>
                                        <textarea name="description" class="form-control" rows="7">{{ old('description') }}</textarea>
                                    </div>
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
