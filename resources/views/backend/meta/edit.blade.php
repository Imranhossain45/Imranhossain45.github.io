@extends('layouts.backend.master')
@section('title','Edit Meta Info')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Meta Info</li>
                    </ol>
                </nav>
                <h1 class="m-0">Meta Info</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit Meta Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.meta.update',$meta->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <b>Title:</b>
                                    <input type="hidden" name="page_name" value="{{ $meta->page_name }}">
                                    <input type="text" name="title" class=" form-control"
                                        value="{{ $meta->title }}">
                                </div>
                                {{-- <div class="form-group mt-2">
                                    <b>Page Name:</b>
                                    <input type="text" name="page_name" class="form-control"
                                        value="{{ $meta->page_name }}">
                                </div> --}}
                                <div class="form-group mt-2">
                                    <b>Keyword:</b>
                                    <input type="text" name="keyword" class="form-control"
                                        value="{{ $meta->keyword }}">
                                </div>
                                <div class="form-group mt-2">
                                    <b>Description:</b>
                                    <textarea name="description" class="form-control" rows="7">{{ $meta->description }}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <b>Photo:</b>
                                    <input type="file" name="photo" class="form-control">
                                    <img src="{{ $meta->m_photo }}"
                                        class="mt-2" width="60" alt="meta">
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
