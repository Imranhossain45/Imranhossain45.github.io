@extends('layouts.backend.master')
@section('title', 'Create Banner')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Banner</li>
                    </ol>
                </nav>
                <h1 class="m-0">Banner</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Banner</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.banner.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class=" form-group">
                                    <label>Title:</label>
                                    <input type="text" name="title" class=" form-control" placeholder="Enter Title"
                                        value="{{ old('title1') }}">
                                </div>
                                <div class="mt-3 form-group">
                                    <label>URL(Shop Women):</label>
                                    <input type="text" name="url1" class=" form-control" placeholder="Enter  Title"
                                        value="{{ old('url1') }}">
                                </div>
                                <div class="mt-3 form-group">
                                    <label>URL(Shop Men):</label>
                                    <input type="text" name="url2" class=" form-control" placeholder="Enter Title"
                                        value="{{ old('url2') }}">
                                </div>
                                <div class="mt-3 form-group">
                                    <label>URL(Shop Kids):</label>
                                    <input type="text" name="url3" class=" form-control" placeholder="Enter Title"
                                        value="{{ old('url3') }}">
                                </div>

                                <div class="row mt-3">

                                    <div class=" form-group col-lg-6">
                                        <label>Photo(1920x1080):</label>
                                        <input type="file" name="photo" class=" form-control">
                                    </div>
                                    <div class=" form-group col-lg-6">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ old('alt_text') }}">
                                    </div>


                                </div>

                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="">Video(<span style="color: red">*If You want to Upload
                                                video,Dont select image*</span>)</label>
                                        <input type="file" name="video" class=" form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="fileType">Select The Chosen File Type</label>
                                        <select class="form-select" name="type">
                                            <option selected disabled>select type</option>
                                            <option value="photo">Photo</option>
                                            <option value="video">Video</option>

                                        </select>
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
