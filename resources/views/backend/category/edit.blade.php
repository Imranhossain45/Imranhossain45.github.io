@extends('layouts.backend.master')
@section('title', 'Edit Category')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                    </ol>
                </nav>
                <h1 class="m-0">Category</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit Category Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.category.update', $category->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label>Name:</label>
                                        <input type="text" name="name" id="name" class=" form-control"
                                            placeholder="Enter Name" value="{{ $category->name }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Slug:</label>
                                        <input type="text" name="slug" class=" form-control" placeholder="Enter Slug"
                                            value="{{ $category->slug }}">

                                    </div>
                                    <div class=" col-lg-4">
                                        <label for="">Select Parent</label>
                                        <select name="parent_id" id="parent_id" class="form-control">
                                            <option selected disabled>Select Parent</option>
                                            @foreach ($categories as $categoryData)
                                                <option
                                                    value="{{ $categoryData->id }}"{{ $categoryData->id ==  $category->parent_id ? 'selected' : '' }}>
                                                    {{ $categoryData->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-12">
                                        <label>Description:</label>
                                        <textarea name="description" id="editor" cols="30" rows="10">{{ $category->description }}</textarea>

                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class=" form-group col-lg-4">
                                        <label>Photo(250x250):</label>
                                        <input type="file" name="photo" class="form-control" id="photoInput">
                                        <img src="{{ $category->photo }}" class="mt-2" width="60px" alt="">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class=" form-group col-lg-4">
                                        <label>Meta Photo:</label>
                                        <input type="file" name="m_photo" class=" form-control" id="photoInput1"
                                            value="{{ old('meta_photo') }}">
                                        (16*9 ratio recommended)
                                        <img src="{{ $category->m_photo }}" class="mt-2" width="60px" alt="">
                                        <img id="previewImage1" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>


                                    <div class="form-group col-lg-4">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" id="alt_text" class=" form-control"
                                            placeholder="Enter Alter Text" value="{{ $category->alt_text }}">

                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-4">
                                        <label>Meta Title:</label>
                                        <input type="text" name="m_title" class="form-control mt-2"
                                            placeholder="Enter Meta Title" value="{{ $category->m_title }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Meta Keyword:</label>
                                        <input type="text" name="m_keyword" class="form-control mt-2"
                                            placeholder="Enter Meta Keyword" value="{{ $category->m_keyword }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Meta Description:</label>
                                        <textarea name="m_description" class="form-control mt-2" placeholder="Enter Meta Description" rows="1">{{ $category->m_description }}</textarea>
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
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
