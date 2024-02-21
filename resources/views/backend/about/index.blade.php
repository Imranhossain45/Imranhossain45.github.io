@extends('layouts.backend.master')
@section('title', 'Create Documents')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
                <h1 class="m-0">About Us</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">About Us</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.about.update', $about->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row form-group">
                                    <div class="col-lg-4">
                                        <label for="title">Title:</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Enter Title" value="{{ $about->title }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="photo">Photo (1410x80):</label>
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="photo">Choose Photo</label>
                                            <input type="file" name="photo" class="custom-file-input" id="photoInput">
                                        </div>
                                        <img src="{{ $about->photo }}" class="mt-3 img-thumbnail" width="80"
                                            alt="Current Photo">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="altText">Alt Text:</label>
                                        <input type="text" name="alt_text" id="altText" class="form-control"
                                            placeholder="Enter Alt Text" value="{{ $about->alt_txt }}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <label for="content">Content:</label>
                                        <textarea name="content" id="editor" class="form-control" rows="6">{{ $about->content }}</textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <button type="submit" name="submit" class="btn btn-primary mt-3">Update</button>
                                    </div>
                                </div>
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
