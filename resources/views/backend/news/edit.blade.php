@extends('layouts.backend.master')
@section('title', 'Edit News')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
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
              <h1 class="text-center">Edit News Info</h1>
            </div>
            <div class="card-body">
              <form action="{{ route('backend.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class=" form-group">
                  <label>Title:</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter news Title"
                    value="{{ $news->title }}">
                </div>
                <div class="form-group mt-2">
                  <label>Slug:</label>
                  <input type="text" name="slug" class="form-control" placeholder="Enter Slug"
                    value="{{ $news->slug }}">
                </div>
                <div class="row mt-3">
                  <div class="form-group col-lg-3">
                    <label>Select Category:</label>
                    <select name="category_id" id="" class="form-control">
                      <option selected disabled>Select Category</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $news->category_id ? 'selected' : '' }}>
                          {{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-lg-3">
                    <label>Select Journalist:</label>
                    <select name="journalist_id" id="" class="form-control">
                      <option selected disabled>Select Journalist</option>
                      @foreach ($journalists as $journalist)
                        <option value="{{ $journalist->id }}"
                          {{ $journalist->id == $news->journalist_id ? 'selected' : '' }}>
                          {{ $journalist->name }}</option>
                      @endforeach

                    </select>
                  </div>
                  {{-- <div class="form-group col-lg-3">
                                        <label>Auther Name:</label>
                                        <input type="text" name="auther" class=" form-control"
                                            placeholder="Enter Auther Name" value="{{ $news->auther }}">
                                    </div> --}}
                  <div class=" form-group col-lg-3">
                    <label>Photo(850x565):</label>
                    <input type="file" name="photo" class=" form-control" id="photoInput">
                    <img src="{{ $news->photo }}" class="mt-3" width="60" alt="">
                    <img id="previewImage" class="mt-3" src="#" alt="Preview"
                      style="display: none; max-width: 80px; max-height: 80px;">
                  </div>
                  <div class=" form-group col-lg-3">
                    <label>Meta Photo:</label>
                    <input type="file" name="m_photo" class=" form-control" id="photoInput">
                     [16x9 ratio recommended]
                    <img src="{{ $news->m_photo }}" class="mt-3" width="60" alt="">
                    <img id="previewImage" class="mt-3" src="#" alt="Preview"
                      style="display: none; max-width: 80px; max-height: 80px;">
                  </div>
                  <div class=" form-group col-lg-3">
                    <label>Alter Text:</label>
                    <input type="text" name="alt_text" class="form-control" placeholder="Enter Alter Text"
                      value="{{ $news->alt_text }}">
                  </div>
                  <div class=" form-group col-lg-3">
                    <label>Date:</label>
                    <input type="datetime-local" name="date" class="form-control" value="{{ $news->date }}">
                  </div>
                  <div class="form-group col-lg-2 mt-4">
                    <label for="" class="mr-2">Top News:</label>
                    <label class="switch">
                      <input type="checkbox" name="top_news" {{ $news->top_news == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-2 mt-4">
                    <label for="" class="mr-2">Trending:</label>
                    <label class="switch">
                      <input type="checkbox" name="trending" {{ $news->trending == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-2 mt-4">
                    <label for="" class="mr-2">Bangladesh:</label>
                    <label class="switch">
                      <input type="checkbox" name="bangladesh" {{ $news->bangladesh == 1 ? 'checked' : '' }}
                        value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="form-group col-lg-2">
                    <label for="" class="mr-2">Cricket World Cup 2023:</label>
                    <label class="switch">
                      <input type="checkbox" name="icc_wc" {{ $news->icc_wc == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-1">
                    <label for="" class="mr-2">IPL:</label>
                    <label class="switch">
                      <input type="checkbox" name="ipl" {{ $news->ipl == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-1">
                    <label for="" class="mr-2">BPL:</label>
                    <label class="switch">
                      <input type="checkbox" name="bpl" {{ $news->bpl == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-1">
                    <label for="" class="mr-2">CPL:</label>
                    <label class="switch">
                      <input type="checkbox" name="cpl" {{ $news->cpl == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-1">
                    <label for="" class="mr-2">PSL:</label>
                    <label class="switch">
                      <input type="checkbox" name="psl" {{ $news->psl == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-1">
                    <label for="" class="mr-2">BBL:</label>
                    <label class="switch">
                      <input type="checkbox" name="bbl" {{ $news->bbl == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-1">
                    <label for="" class="mr-2">LPL:</label>
                    <label class="switch">
                      <input type="checkbox" name="lpl" {{ $news->lpl == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="form-group col-lg-1">
                    <label for="" class="mr-2">UEFA:</label>
                    <label class="switch">
                      <input type="checkbox" name="uefa" {{ $news->uefa == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-1">
                    <label for="" class="mr-2">EPL:</label>
                    <label class="switch">
                      <input type="checkbox" name="epl" {{ $news->epl == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-2">
                    <label for="" class="mr-2">La Liga:</label>
                    <label class="switch">
                      <input type="checkbox" name="la_liga" {{ $news->la_liga == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-2">
                    <label for="" class="mr-2">Serie A:</label>
                    <label class="switch">
                      <input type="checkbox" name="serie_a" {{ $news->serie_a == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-2">
                    <label for="" class="mr-2">Bundesliga:</label>
                    <label class="switch">
                      <input type="checkbox" name="b_liga" {{ $news->b_liga == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-2">
                    <label for="" class="mr-2">League 1:</label>
                    <label class="switch">
                      <input type="checkbox" name="leg_1" {{ $news->leg_1 == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-2">
                    <label for="" class="mr-2">Major League:</label>
                    <label class="switch">
                      <input type="checkbox" name="m_leg" {{ $news->m_leg == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="form-group col-lg-2">
                    <label for="" class="mr-2">Saudi Pro:</label>
                    <label class="switch">
                      <input type="checkbox" name="s_pro" {{ $news->s_pro == 1 ? 'checked' : '' }} value="1">
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="form-group mt-3">
                  <label>Video URL:</label>
                  <input type="text" name="url" class="form-control" value="{{ $news->url }}">
                </div>
                <div class=" form-group mt-3">
                  <label>Description:</label>
                  <textarea name="description" id="editor" class=" form-control " rows="7"
                    placeholder="Enter news Description">{{ $news->description }}</textarea>
                </div>
                <div class="row mt-3">
                  <div class="form-group col-lg-4">
                    <label>Meta Title:</label>
                    <input type="text" name="m_title" class="form-control mt-2" placeholder="Enter Meta Title"
                      value="{{ $news->m_title }}">
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Meta Keyword:</label>
                    <input type="text" name="m_keyword" class="form-control mt-2" placeholder="Enter Meta Keyword"
                      value="{{ $news->m_keyword }}">
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Meta Description:</label>
                    <textarea name="m_description" class="form-control mt-2" placeholder="Enter Meta Description" rows="1">{{ $news->m_description }}</textarea>
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
