@extends('layouts.backend.master')
@section('title', 'All Category')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
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
                                <h4 class="text-center">Active Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Parent</th>
                                                <th>Alter Text</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($activeCategory as $category)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>
                                                        <img src="{{ $category->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $category->name ?? getCategoryname($category->parent_id) }}</td>
                                                    <td class="description-cell">
                                                        {!! \Str::limit($category->description ?? '', 150) !!}
                                                    </td>

                                                    <td>{{ getCategoryname($category->parent_id) ?? '' }}</td>
                                                    <td>{{ $category->alt_text }}</td>
                                                    <td>{{ $category->status }}</td>
                                                    <td class="td_btn">

                                                        <a href="{{ route('backend.category.edit', $category->id) }}"
                                                            class="btn btn-sm btn-info"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ route('backend.category.status', $category->id) }}"
                                                            class="btn {{ $category->status == 'publish' ? 'btn-sm btn-warning' : 'btn-sm btn-success' }}">
                                                            @if ($category->status == 'publish')
                                                                <i class="fa-solid fa-pen-ruler"></i>
                                                            @else
                                                                <i class="fa-solid fa-upload"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{ route('backend.category.trash', $category->id) }}"
                                                            class=" btn btn-sm btn-danger"><i
                                                                class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $activeCategory->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft Categorys</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($draftCategory as $category)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>
                                                        <img src="{{ $category->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->status }}</td>
                                                    <td class="td_btn">

                                                        <a href="#"
                                                            data-href="{{ route('backend.category.update', $category->id) }}"
                                                            data-item="{{ $category }}"
                                                            class="btn btn-sm btn-info edit">Edit</a>
                                                        <a href="{{ route('backend.category.status', $category->id) }}"
                                                            class=" btn {{ $category->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $category->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                                                        <a href="{{ route('backend.category.trash', $category->id) }}"
                                                            class="btn btn-sm btn-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftCategory->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed categorys</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($trashedCategory as $category)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>
                                                        <img src="{{ $category->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->status }}</td>
                                                    <td class="td_btn">
                                                        <a href="{{ route('backend.category.reStore', $category->id) }}"
                                                            class="btn btn-sm btn-success">Restore</a>

                                                        <form
                                                            action="{{ route('backend.category.delete', $category->id) }}"
                                                            method="POST" class="delete_form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you Sure to Delete?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $trashedCategory->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12 m_top">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Category</h4>
                    </div>
                    <div class="card-body">
                        <form></form>
                        <form action="{{ route('backend.category.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="text" class="form-control mb-3" name="name" placeholder="Name"
                                value="{{ old('name') }}">
                            <label>Photo(438x560):</label>
                            <input type="file" name="photo" class="form-control" id="photoInput">
                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                style="display: none; max-width: 80px; max-height: 80px;">
                            <div class="mt-2">
                                <label for="">Alter Text:</label>
                                <input type="text" name="alt_text" id="" class="form-control"
                                    placeholder="Enter Alter Text">
                            </div>
                            <button type="submit" class=" btn btn-sm btn-primary my-3">Add+</button>
                            
                            <div class="card-header">
                                <h4>Add Sub Category</h4>
                            </div>

                            <div class="mt-2">
                                <select name="parent_id" id="" class="form-control">
                                    <option selected disabled>Select Parent</option>
                                    @foreach ($childCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" class="form-control mt-2" name="name" placeholder="Name"
                                value="{{ old('name') }}">

                            <div class="mt-2">
                                <label>Photo(438x560):</label>
                                <input type="file" name="photo" class="form-control" id="photoInput">
                                <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                    style="display: none; max-width: 80px; max-height: 80px;">
                            </div>
                            <div class="mt-2">
                                <label for="">Alter Text:</label>
                                <input type="text" name="alt_text" id="" class="form-control"
                                    placeholder="Enter Alter Text">
                            </div>
                            <button type="submit" class=" btn btn-sm btn-primary my-3">Add+</button>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>


@endsection
{{-- @push('script')
    <script>
        $(document).on('click', '.edit', function(e) {
            const modal = $('#edit');

            const item = $(this).data('item');

            $('#name').val(item.name);
            // $('#parent_id').val(item.parent_id);
            $('#slug').val(item.slug);
            $('#alt_text').val(item.alt_text);
            $('#oldImg').attr("src", item.photo);

            $("#parent_id option").each(function() {
            if ($(this).val() === item.parent_id) {
                $(this).prop('selected', true);
            } else {
                $(this).prop('selected', false);
            }
        });

            modal.find('form').attr('action', $(this).data('href'));
            modal.modal('show');
        });
    </script>
@endpush --}}
