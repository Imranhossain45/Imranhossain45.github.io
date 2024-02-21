@extends('layouts.backend.master')
@section('title', 'All Banner')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Active</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Draft</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Trash</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Active Banner</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>URL(Shop Women)</th>
                                                <th>URL(Shop Men)</th>
                                                <th>URL(Shop Kids)</th>
                                                <th>Alter Text</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeBanner as $banner)
                                                <tr>
                                                    <td>{{ $banner->id }}</td>
                                                    <td>
                                                        @if (isset($banner->photo))
                                                            <img src="{{ $banner->photo }}" width="80px" alt=""
                                                                style="padding: 0!important">
                                                        @else
                                                            <video width="150px" height="100px" controls>
                                                                <source src="{{ $banner->video }}" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @endif
                                                    </td>

                                                    <td>{{ $banner->title }}</td>
                                                    <td>{{ $banner->url1 }}</td>
                                                    <td>{{ $banner->url2 }}</td>
                                                    <td>{{ $banner->url3 }}</td>
                                                    <td>{{ $banner->alt_text }}</td>
                                                    <td style="color: red">{{ $banner->type }}</td>



                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $banner->id }}','{{ $banner->title }}','{{ $banner->url1 }}','{{ $banner->url2 }}','{{ $banner->url3 }}','{{ $banner->photo }}','{{ $banner->alt_text }}','{{ $banner->video }}')"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="{{ route('backend.banner.status', $banner->id) }}"
                                                            class=" btn {{ $banner->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($banner->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>

                                                        <a href="{{ route('backend.banner.trash', $banner->id) }}"
                                                            class="btn btn-sm btn-danger">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeBanner->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft banners</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>URL(Shop Women)</th>
                                                <th>URL(Shop Men)</th>
                                                <th>URL(Shop Kids)</th>
                                                <th>Alter Text</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($draftBanners as $banner)
                                                <tr>
                                                    <td>{{ $banner->id }}</td>
                                                    <td>
                                                        @if (isset($banner->photo))
                                                            <img src="{{ $banner->photo }}" width="80px" alt=""
                                                                style="padding: 0!important">
                                                        @else
                                                            <video width="150px" height="100px" controls>
                                                                <source src="{{ $banner->video }}" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @endif
                                                    </td>

                                                    <td>{{ $banner->title }}</td>
                                                    <td>{{ $banner->url1 }}</td>
                                                    <td>{{ $banner->url2 }}</td>
                                                    <td>{{ $banner->url3 }}</td>
                                                    <td>{{ $banner->alt_text }}</td>



                                                    <td class="td_btn">

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                            onclick="updatedata('{{ $banner->id }}','{{ $banner->title }}','{{ $banner->url1 }}','{{ $banner->url2 }}','{{ $banner->url3 }}','{{ $banner->photo }}','{{ $banner->alt_text }}','{{ $banner->video }}')"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>

                                                        <a href="{{ route('backend.banner.status', $banner->id) }}"
                                                            class=" btn {{ $banner->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($banner->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>

                                                        <a href="{{ route('backend.banner.trash', $banner->id) }}"
                                                            class=" btn btn-sm btn-danger">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftBanners->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed banners</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <thead class="">
                                        <tr>
                                            <th>Id</th>
                                            <th>Photo/Video</th>
                                            <th>Title</th>
                                            <th>URL(Shop Women)</th>
                                            <th>URL(Shop Men)</th>
                                            <th>URL(Shop Kids)</th>
                                            <th>Alter Text</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table">

                                        @foreach ($draftBanners as $banner)
                                            <tr>
                                                <td>{{ $banner->id }}</td>
                                                <td>
                                                    @if (isset($banner->video))
                                                        <img src="{{ $banner->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    @else
                                                        <video width="320" height="240" controls>
                                                            <source src="{{ $banner->video }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    @endif
                                                </td>



                                                <td>{{ $banner->title }}</td>
                                                <td>{{ $banner->url1 }}</td>
                                                <td>{{ $banner->url2 }}</td>
                                                <td>{{ $banner->url3 }}</td>
                                                <td>{{ $banner->alt_text }}</td>
                                                <td class="td_btn d-flex">
                                                    <a href="{{ route('backend.banner.reStore', $banner->id) }}"
                                                        class="btn btn-sm btn-success"
                                                        style="height: 22px;margin-right:5px">
                                                        <i class="fa-solid fa-box"></i>
                                                    </a>

                                                    <form action="{{ route('backend.banner.delete', $banner->id) }}"
                                                        method="POST" class="delete_form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you Sure to Delete?')">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $trashedBanners->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
<script>
    function updatedata(id, title, url1, url2, url3, photo, alt_text, video) {
        $("#id").val(id);
        $("#title").val(title);
        $("#url1").val(url1);
        $("#url2").val(url2);
        $("#url3").val(url3);
        $('#edit_image').attr('src', photo);
        $("#alt_text").val(alt_text);
        $('#edit_video').attr('src', video);
    }
</script>
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit banner Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.banner.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class=" form-group">
                        <label>Title:</label>
                        <input type="text" name="title" id="title" class=" form-control"
                            placeholder="Enter Title">
                        <input type="hidden" name="id" id="id">
                    </div>
                    <div class=" form-group">
                        <label>URL(Shop Women):</label>
                        <input type="text" name="url1" id="url1" class=" form-control"
                            placeholder="Enter Title">

                    </div>
                    <div class=" form-group">
                        <label>URL(Shop Men):</label>
                        <input type="text" name="url2" id="url2" class=" form-control"
                            placeholder="Enter Title">

                    </div>
                    <div class=" form-group">
                        <label>URL(Shop Kids):</label>
                        <input type="text" name="url3" id="url3" class=" form-control"
                            placeholder="Enter Title">

                    </div>

                    <div class=" form-group">
                        <label>Alter Text:</label>
                        <input type="text" name="alt_text" id="alt_text" class="form-control">
                    </div>

                    <div class="row mt-3">

                        <div class=" form-group mt-3">
                            <label>Photo(1920x1080):</label>
                            <input type="file" name="photo" class=" form-control" id="photoInput">
                            <img class="mt-3" width="60" alt="" id="edit_image">
                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                style="display: none; max-width: 80px; max-height: 80px;">
                        </div>
                    </div>
                    <div class="row mt-3">

                        <div class=" form-group mt-3">
                            <label>Video:</label>
                            <input type="file" name="video" class=" form-control" id="photoInput">

                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div> --}}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
