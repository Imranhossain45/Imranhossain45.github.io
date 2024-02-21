@extends('layouts.backend.master')
@section('title', 'All partner')
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
                                <h4 class="text-center">Active partner</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($activePartner as $partner)
                                                <tr>
                                                    <td>{{ $partner->id }}</td>
                                                    <td>
                                                        <img src="{{ $partner->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $partner->status }}</td>
                                                    <td class="td_btn">

                                                        <a href="#" data-href="{{ route('backend.partner.update',$partner->id) }}" data-item="{{ $partner }}"
                                                            class="btn btn-sm btn-info edit"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ route('backend.partner.status', $partner->id) }}"
                                                            class="btn {{ $partner->status == 'publish' ? 'btn-sm btn-warning' : 'btn-sm btn-success' }}">
                                                            @if ($partner->status == 'publish')
                                                            <i class="fa-solid fa-pen-ruler"></i>
                                                        @else
                                                            <i class="fa-solid fa-upload"></i>
                                                        @endif
                                                        </a>
                                                        <a href="{{ route('backend.partner.trash', $partner->id) }}"
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
                                        {{ $activePartner->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Draft partners</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table text-center">

                                            @foreach ($draftPartner as $partner)
                                                <tr>
                                                    <td>{{ $partner->id }}</td>
                                                    <td>
                                                        <img src="{{ $partner->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $partner->status }}</td>
                                                    <td class="td_btn">

                                                        <a href="#" data-href="{{ route('backend.partner.update',$partner->id) }}" data-item="{{ $partner }}"
                                                            class="btn btn-sm btn-info edit"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ route('backend.partner.status', $partner->id) }}"
                                                            class=" btn {{ $partner->status == 'publish' ? 'btn-sm btn-warning' : 'btn-sm btn-success' }}">
                                                            @if ($partner->status == 'publish')
                                                            <i class="fa-solid fa-pen-ruler"></i>
                                                        @else
                                                            <i class="fa-solid fa-upload"></i>
                                                        @endif
                                                        </a>
                                                        <a href="{{ route('backend.partner.trash', $partner->id) }}"
                                                            class="btn btn-sm btn-danger"><i
                                                            class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $draftPartner->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Trashed Partners</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">

                                            @foreach ($trashedPartner as $partner)
                                                <tr>
                                                    <td>{{ $partner->id }}</td>
                                                    <td>
                                                        <img src="{{ $partner->photo }}" width="80px" alt=""
                                                            style="padding: 0!important">
                                                    </td>
                                                    <td>{{ $partner->status }}</td>
                                                    <td class="td_btn d-flex">
                                                        <a href="{{ route('backend.partner.reStore', $partner->id) }}"
                                                            class="btn btn-sm btn-success" style="height: 27px;margin-top:8px;margin-right:5px"><i class="fa-solid fa-box"></i></a>

                                                        <form action="{{ route('backend.partner.delete', $partner->id) }}"
                                                            method="POST" class="delete_form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="mt-2 btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you Sure to Delete?')"><i class="fa-solid fa-trash-can"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="mt-3">
                                        {{ $trashedPartner->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card m_top">
                    <div class="card-header">
                        <h4>Add Partner</h4>
                    </div>
                    <div class="card-body">
                        <form></form>
                        <form action="{{ route('backend.partner.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <label>Photo(255x58):</label>
                            <input type="file" name="photo" class="form-control" id="photoInput">
                            <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                style="display: none; max-width: 80px; max-height: 80px;">
                            <button type="submit" class=" btn btn-sm btn-primary my-3">Add+</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- sample modal content -->
<div id="edit" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit partner Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body"> 
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class=" form-group">
                        <b>Photo(255x58):</b>
                        <input type="file" name="photo" class=" form-control" id="photoInput">
                        <img src="" class="mt-2" id="oldImg" width="60" alt="partner">
                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                style="display: none; max-width: 80px; max-height: 80px;">
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
@endsection
@push('script')
<script>
    $(document).on('click', '.edit', function(e) {
        const modal = $('#edit');

        const item = $(this).data('item');
        $('#oldImg').attr("src", item.photo);

        modal.find('form').attr('action', $(this).data('href'));
        modal.modal('show');
    });
</script>
@endpush

