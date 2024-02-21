@extends('layouts.backend.master')
@section('title', 'All Blogs')
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
                                <h4 class="text-center">Active Article</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Auther Name</th>
                                                <th>Title</th>
                                                <th>Published Date</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($activeBlogs as $blog)
                                                <tr>
                                                    <td>{{ $blog->id }}</td>
                                                    <td>
                                                        <img src="{{ $blog->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $blog->auther }}</td>
                                                    <td>{{ $blog->title }}</td>
                                                    <td>{{ $blog->date }}</td>
                                                    <td>{{ $blog->status }}</td>
                                                    <td class="td_btn text-center">


                                                        <a href="{{ route('backend.blog.edit', $blog->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-pen-to-square"></i>

                                                        </a>
                                                        <a href="{{ route('backend.blog.status', $blog->id) }}"
                                                            class=" btn {{ $blog->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($blog->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.blog.trash', $blog->id) }}"
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
                                        {{ $activeBlogs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Journal</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Meta Photo</th>
                                                <th>Alter Text</th>
                                                <th>Auther Name</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th>Published Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($draftBlogs as $blog)
                                                <tr>
                                                    <td>{{ $blog->id }}</td>
                                                    <td>
                                                        <img src="{{ $blog->photo }}" width="80px" alt="">
                                                    </td>
                                                    <td>
                                                        <img src="{{ $blog->meta_photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $blog->alt_text }}</td>
                                                    <td>{{ $blog->auther }}</td>
                                                    <td>{{ $blog->title }}</td>
                                                    <td>{{ $blog->slug }}</td>
                                                    <td>{{ Str::limit($blog->description, 20, '...') }}</td>
                                                    <td>{{ $blog->date }}</td>
                                                    <td>{{ $blog->status }}</td>
                                                    <td class="td_btn">

                                                        <a href="{{ route('backend.blog.edit', $blog->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>

                                                        <a href="{{ route('backend.blog.status', $blog->id) }}"
                                                            class=" btn {{ $blog->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                                                            @if ($blog->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.blog.trash', $blog->id) }}"
                                                            class="mt-2 btn btn-sm btn-danger">
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
                                        {{ $draftBlogs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Journal</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Meta Photo</th>
                                                <th>Alter Text</th>
                                                <th>Auther</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th>Published Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedBlogs as $blog)
                                                <tr>
                                                    <td>{{ $blog->id }}</td>
                                                    <td>
                                                        <img src="{{ $blog->photo }}" width="80px" alt="">
                                                    </td>
                                                    <td>
                                                        <img src="{{ $blog->meta_photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $blog->alt_text }}</td>
                                                    <td>{{ $blog->auther }}</td>
                                                    <td>{{ $blog->title }}</td>
                                                    <td>{{ $blog->slug }}</td>
                                                    <td>{{ Str::limit($blog->description, 20, '...') }}</td>
                                                    <td>{{ $blog->date }}</td>
                                                    <td>{{ $blog->status }}</td>
                                                    <td class="td_btn d-flex">
                                                        <a href="{{ route('backend.blog.reStore', $blog->id) }}"
                                                            class="btn btn-sm btn-success"
                                                            style="height: 22px;margin-top:8px;margin-right:5px">
                                                            <i class="fa-solid fa-box"></i>
                                                        </a>

                                                        <form action="{{ route('backend.blog.delete', $blog->id) }}"
                                                            method="POST" class="delete_form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="mt-2 btn btn-sm btn-danger"
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
                                        {{ $trashedBlogs->links() }}
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

@foreach ($blogModaldata as $blog)
    <div id="viewModal{{ $blog->id }}" class="modal custom_modal fade" tabindex="-1"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title text-center" id="myModalLabel">Blog Info</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">Photo:</label>
                            <br>
                            <img src="{{ $blog->photo }}" width="100" height="80" alt="">
                        </div>
                        <div class="col-lg-3">
                            <label for="">Alter Text:</label>
                            <br>
                            {{ $blog->alt_text }}
                        </div>
                        <div class="col-lg-3">
                            <label for="">Published Date:</label>
                            <br>
                            {{ $blog->date }}
                        </div>

                        <div class="col-lg-3">
                            <label for="">Auther:</label>
                            <br>
                            {{ $blog->auther }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mt-3">
                            <label for="">Title:</label>
                            <br>
                            {{ $blog->title }}
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label for="">Slug:</label>
                            <br>
                            {{ $blog->slug }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="">Description:</label>
                        <br>
                        {!! $blog->description !!}
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3">
                            <label for="">Meta Photo:</label>
                            <br>
                            <img src="{{ $blog->meta_photo }}" width="100" height="80" alt="">
                        </div>
                        <div class="col-lg-3">
                            <label for="">Meta Title:</label>
                            <br>
                            {{ $blog->m_title }}
                        </div>
                        <div class="col-lg-3">
                            <label for="">Meta Keyword:</label>
                            <br>
                            {{ $blog->m_keyword }}
                        </div>
                        <div class="col-lg-3">
                            <label for="">Meta Description:</label>
                            <br>
                            {{ $blog->m_description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div id="viewModal" class="modal custom_modal fade" tabindex="-1" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title text-center" id="myModalLabel">Blog Info</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">Photo:</label><br>
                        <img src="{{ $blog->photo }}" width="60" alt="">
                    </div>
                    <!-- More fields... -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to populate modal fields when the modal is shown
    $('#viewModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var blogData = button.data('blog'); // Get the JSON-encoded blog data
        var modal = $(this);

        // Populate modal fields with blog data
        modal.find('#myModalLabel').text(blogData.title);
        modal.find('#modalPhoto').attr('src', blogData.photo);
        modal.find('#modalMetaPhoto').attr('src', blogData.meta_photo);
        modal.find('#modalPublishedDate').text(blogData.date);
        modal.find('#modalAuthor').text(blogData.author);
        modal.find('#modalDescription').text(blogData.description);
    });
</script>
