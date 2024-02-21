@extends('layouts.backend.master')
@section('title', 'Create Cricketer')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cricketer</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Cricketer Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.playerData.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>ID:</label>
                                        <input type="text" name="id" class=" form-control" placeholder="Enter Name"
                                            value="{{ old('id') }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Name:</label>
                                        <input type="text" name="name" class=" form-control" placeholder="Enter Name"
                                            value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Image ID:</label>
                                        <input type="text" name="imageId" class=" form-control" placeholder="Enter Name"
                                            value="{{ old('imageId') }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>battingStyle:</label>
                                        <input type="text" name="battingStyle" class=" form-control" placeholder="Enter battingStyle"
                                            value="{{ old('battingStyle') }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>bowlingStyle:</label>
                                        <input type="text" name="bowlingStyle" class=" form-control" placeholder="Enter bowlingStyle"
                                            value="{{ old('bowlingStyle') }}">
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
