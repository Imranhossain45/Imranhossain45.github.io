@extends('layouts.backend.master')
@section('title', 'All teams')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Active</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Founder Info</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>Id</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Designation</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table">
                                            <tr>
                                                <td>{{ $founder->id }}</td>
                                                <td>
                                                    <img src="{{ $founder->photo }}" width="80px" alt=""
                                                        style="padding: 0!important">
                                                </td>
                                                <td>{{ $founder->name }}</td>
                                                <td>{{ $founder->email }}</td>
                                                <td>{{ $founder->designation }}</td>
                                                <td>{{ $founder->status }}</td>
                                                <td class="td_btn text-center">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{ $founder->id }}"
                                                        class="btn btn-sm btn-success">
                                                    <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <a href="#"
                                                        data-href="{{ route('backend.team.update', $founder->id) }} "
                                                        data-item="{{ $founder }}"
                                                        class="btn btn-sm btn-info edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
                    <h5 class="modal-title" id="myModalLabel">Edit Founder Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Name:</label>
                                <input type="hidden" name="id" id="id">
                                <input type="text" name="name" id="name" class=" form-control"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Email:</label>
                                <input type="email" name="email" id="email" class=" form-control"
                                    placeholder="Enter Email">
                            </div>

                            {{-- <div class="form-group">
                            <label>Phone:</label>
                            <input type="number" name="phone" class=" form-control"
                                placeholder="Enter Name" value="{{ old('phone') }}" required>
                        </div> --}}

                        </div>
                        <div class="row mt-3">
                            <input type="hidden" name="designation" id="designation" class=" form-control"
                                    placeholder="Enter Designation">
                            {{-- <div class="form-group col-lg-6">
                                <label>Designation:</label>
                                <input type="hidden" name="designation" id="designation" class=" form-control"
                                    placeholder="Enter Designation">
                            </div> --}}
                            <div class="form-group col-lg-12">
                                <label>Photo(150x150):</label>
                                <input type="file" name="photo" class="form-control" id="photoInput">
                                <img src="" class="mt-2" id="oldImg" alt="" width="80px">
                                <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                    style="display: none; max-width: 80px; max-height: 80px;">

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-lg-6">
                                <label>Facebook:</label>
                                <input type="text" name="facebook" id="facebook" class=" form-control"
                                    placeholder="Enter facebook">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Linkedin:</label>
                                <input type="text" name="linkedin" id="linkedin" class=" form-control"
                                    placeholder="Enter Linkedin">
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-lg-6">
                                <label>Twitter:</label>
                                <input type="text" name="twitter" id="twitter" class=" form-control"
                                    placeholder="Enter twitter">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Instagram:</label>
                                <input type="text" name="instagram" id="instagram" class=" form-control"
                                    placeholder="Enter Instagram">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Short Description:</label>
                            <textarea name="short_description" id="short_description" class="form-control" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Description:</label>
                            <textarea name="description" id="description" class="form-control" rows="7"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).on('click', '.edit', function(e) {
            const modal = $('#edit');

            const item = $(this).data('item');

            $('#name').val(item.name);
            $('#email').val(item.email);
            $('#designation').val(item.designation);
            $('#facebook').val(item.facebook);
            $('#linkedin').val(item.linkedin);
            $('#twitter').val(item.twitter);
            $('#instagram').val(item.instagram);
            $('#short_description').val(item.short_description);
            $('#description').val(item.description);
            $('#oldImg').attr("src", item.photo);

            modal.find('form').attr('action', $(this).data('href'));
            modal.modal('show');
        });
    </script>
@endpush

@foreach ($teamid as $team)
    <div id="viewModal{{ $team->id }}" class="modal custom_modal fade" tabindex="-1"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title text-center" id="myModalLabel">Team Info</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">Photo:</label>
                            <br>
                            <img src="{{ $team->photo }}" alt="">
                        </div>
                        <div class="col-lg-3">
                            <label for="">Name:</label>
                            <br>
                            {{ $team->name }}
                        </div>
                        <div class="col-lg-3">
                            <label for="">Email:</label>
                            <br>
                            {{ $team->email }}
                        </div>
                        <div class="col-lg-3">
                            <label for="">Designation:</label>
                            <br>
                            {{ $team->designation }}
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-3">
                            <label for="">Facebook:</label>
                            <br>
                            {{ $team->facebook }}
                        </div>
                        <div class="col-lg-3">
                            <label for="">Linkedin:</label>
                            <br>
                            {{ $team->linkedin }}
                        </div>
                        <div class="col-lg-3">
                            <label for="">Twitter:</label>
                            <br>
                            {{ $team->twitter }}
                        </div>
                        <div class="col-lg-3">
                            <label for="">Instagram:</label>
                            <br>
                            {{ $team->instagram }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="">Short Descriptin:</label>
                        <br>
                        {{ $team->short_description }}
                    </div>
                    <div class="mt-3">
                        <label for="">Description:</label>
                        <br>
                        {{ $team->description }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach
