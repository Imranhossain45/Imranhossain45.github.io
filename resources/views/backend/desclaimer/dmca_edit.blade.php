@extends('layouts.backend.master')
@section('title', 'Update DMCA Info')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DMCA</li>
                    </ol>
                </nav>
                <h1 class="m-0">DMCA</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit DMCA Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.policy.dmca_update', $desclaimer->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Write DMCA Content:</label>
                                    <textarea name="dmca_content" id="editor" class="form-control " rows="7">{{ $desclaimer->dmca_content }}</textarea>
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
