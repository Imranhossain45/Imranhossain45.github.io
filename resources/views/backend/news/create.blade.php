@extends('layouts.backend.master')
@section('title', 'Create News')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">News</li>
                    </ol>
                </nav>
                <h1 class="m-0">News</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Create News Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.news.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class=" form-group">
                                    <label>Title:</label>
                                    <input type="text" name="title" class=" form-control"
                                        placeholder="Enter News Title" value="{{ old('title') }}" required>
                                </div>
                                <div class=" form-group mt-3">
                                    <label>Slug:</label>
                                    <input type="text" name="slug" class=" form-control"
                                        placeholder="If You Don't Want to create keep it blank" value="{{ old('slug') }}">
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <label>Select Category:</label>
                                        <select name="category_id" id="" class="form-control" required>
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Select Journalist:</label>
                                        <select name="journalist_id" id="" class="form-control" required>
                                            <option selected disabled>Select Category</option>
                                            @foreach ($journalists as $journalist)
                                                <option value="{{ $journalist->id }}">
                                                {{ $journalist->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-group col-lg-3">
                                        <label>Auther Name:</label>
                                        <input type="text" name="auther" class=" form-control"
                                            placeholder="Enter Auther Name" value="{{ old('auther') }}">
                                    </div> --}}
                                    <div class=" form-group col-lg-3">
                                        <label>Photo(850x565):</label>
                                        <input type="file" name="photo" class=" form-control" id="photoInput"
                                            value="{{ old('photo') }}">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Meta Photo:</label>
                                        <input type="file" name="m_photo" class=" form-control" id="photoInput"
                                            value="{{ old('m_photo') }}">
                                            [16x9 ratio recommended]
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-3 mt-3">
                                        <label>Alter Text:</label>
                                        <input type="text" name="alt_text" class="form-control"
                                            placeholder="Enter Alter Text" value="{{ old('alt_text') }}">
                                    </div>
                                    <div class="form-group col-lg-3 mt-3">
                                        <label>Date:</label>
                                        <input type="datetime-local" name="date" class="form-control"
                                            value="{{ old('date') }}" required>
                                    </div>
                                    <div class="form-group col-lg-2 mt-5">
                                        <label for="" class="mr-2">Top News:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="top_news">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-2 mt-5">
                                        <label for="" class="mr-2">Trending:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="trending">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-2 mt-5">
                                        <label for="" class="mr-2">Bangladesh:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="bangladesh">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-2">
                                        <label for="" class="mr-2">Cricket World Cup:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="icc_wc">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <label for="" class="mr-2">IPL:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="ipl">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <label for="" class="mr-2">BPL:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="bpl">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <label for="" class="mr-2">CPL:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="cpl">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <label for="" class="mr-2">PSL:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="psl">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <label for="" class="mr-2">BBL:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="bbl">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                     <div class="form-group col-lg-1">
                                        <label for="" class="mr-2">LPL:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="lpl">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                     <div class="form-group col-lg-1">
                                        <label for="" class="mr-2">UEFA:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="uefa">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                     <div class="form-group col-lg-1">
                                        <label for="" class="mr-2">EPL:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="epl">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                     <div class="form-group col-lg-2">
                                        <label for="" class="mr-2">La Liga:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="la_liga">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                     <div class="form-group col-lg-2">
                                        <label for="" class="mr-2">Serie A:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="serie_a">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                     <div class="form-group col-lg-2">
                                        <label for="" class="mr-2">Bundesliga:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="b_liga">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                     <div class="form-group col-lg-2">
                                        <label for="" class="mr-2">League 1:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="leg_1">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                     <div class="form-group col-lg-2">
                                        <label for="" class="mr-2">Major League:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="m_leg">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                     <div class="form-group col-lg-2">
                                        <label for="" class="mr-2">Saudi Pro:</label>
                                        <label class="switch">
                                            <input type="checkbox" name="s_pro">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="form-group mt-3">
                                    <label>Video URL:</label>
                                    <input type="text" name="url" class="form-control" placeholder="Enter Video URL">
                                </div>
                                <div class=" form-group mt-3">
                                    <label>Description:</label>
                                    <textarea name="description" id="editor" class="form-control " rows="7" placeholder="Enter News Description">{{ old('description') }}</textarea>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-4">
                                        <label>Meta Title:</label>
                                        <input type="text" name="m_title" class="form-control mt-2"
                                            placeholder="Enter Meta Title" value="{{ old('m_title') }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Meta Keyword:</label>
                                        <input type="text" name="m_keyword" class="form-control mt-2"
                                            placeholder="Enter Meta Keyword" value="{{ old('m_keyword') }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Meta Description:</label>
                                        <textarea name="m_description" class="form-control mt-2" placeholder="Enter Meta Description" rows="1">{{ old('m_description') }}</textarea>
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
@push('style')
    <style>
        .switch {
            margin-left: 5px;
            position: relative;
            display: inline-block;
            width: 50px;
            height: 23px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endpush
