@extends('layouts.backend.master')
@section('title', 'Update General Info')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">General Info</li>
                    </ol>
                </nav>
                <h1 class="m-0">General Info</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Edit General Info</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.general_info.update', $generalInfo->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <b>Logo(67x42):</b>
                                        <input type="file" name="logo" class="form-control mt-2" id="photoInput">
                                        <img src="{{ $generalInfo->logo }}" class="mt-2" width="60" alt="Logo">
                                        <img id="previewImage" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>Favicon logo(67x42):</b>
                                        <input type="file" name="favicon_logo" class="form-control mt-2"
                                            id="photoInput2">
                                        <img src="{{ $generalInfo->favicon_logo }}" class="mt-2" width="60"
                                            alt="favicon_logo">
                                        <img id="previewImage2" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    

                                    <div class="form-group col-lg-3">
                                        <b>Footer Logo(67x42):</b>
                                        <input type="file" name="footer_logo" class="form-control mt-2" id="photoInput3">
                                        <img src="{{ $generalInfo->footer_logo }}" class="mt-2" width="60"
                                            alt="footer_logo">
                                        <img id="previewImage3" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>Event Photo(850x565):</b>
                                        <input type="file" name="event_photo" class="form-control mt-2" id="photoInput4">
                                        <input type="hidden" name="hiddeen_event_photo" id="hiddeen_event_photo"
                                            value="">
                                        @if ($generalInfo->event_photo)
                                            <div class="d-flex property-image">
                                                <img src="{{ $generalInfo->event_photo }}" class="mt-2 " width="60"
                                                    alt="event_photo">

                                                <img src="{{ asset('backend/images/icon/cross.png') }}" width="25px" height="25px"
                                                    style="padding-right: 5px; cursor: pointer; margin-left:5px" alt="Remove"
                                                    class="remove-btn mt-2 ml-2" onclick="removeRow(this)">
                                            </div>
                                        @endif
                                        <img id="previewImage4" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    {{-- <div class="form-group col-lg-3">
                                        <b>Subscriber BG(1920x383):</b>
                                        <input type="file" name="subscriber_photo" class="form-control mt-2"
                                            id="photoInput4">
                                        <img src="{{ $generalInfo->subscriber_photo }}" class="mt-2" width="60"
                                            alt="favicon_logo">
                                        <img id="previewImage4" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div> --}}
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <b>Bradcrum Photo(1920x1080):</b>
                                        <input type="file" name="bradcrum_photo" class="form-control mt-2"
                                            id="photoInput4">
                                        <img src="{{ $generalInfo->bradcrum_photo }}" class="mt-2" width="60"
                                            alt="bradcrum_photo">
                                        <img id="previewImage4" class="mt-3" src="#" alt="Preview"
                                            style="display: none; max-width: 80px; max-height: 80px;">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>Site Name:</b>
                                        <input type="text" name="site_name" class=" form-control mt-2"
                                            value="{{ $generalInfo->site_name }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>Email:</b>
                                        <input type="text" name="email" class="form-control mt-2"
                                            value="{{ $generalInfo->email }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>Phone:</b>
                                        <input type="text" name="phone" class=" form-control mt-2"
                                            value="{{ $generalInfo->phone }}">
                                    </div>
                                    {{-- <div class="form-group col-lg-3">
                                        <b>Whatsapp:</b>
                                        <input type="text" name="whatsapp" class=" form-control mt-2"
                                            value="{{ $generalInfo->whatsapp }}">
                                            (Must Use Country Code)
                                    </div> --}}
                                </div>

                                <div class="row mt-3">
                                    <div class="form-group col-lg-4">
                                        <b>Facebook:</b>
                                        <input type="text" name="facebook" class=" form-control mt-2"
                                            value="{{ $generalInfo->facebook }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <b>Instagram:</b>
                                        <input type="text" name="instagram" class=" form-control mt-2"
                                            value="{{ $generalInfo->instagram }}">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <b>LinkedIn:</b>
                                        <input type="text" name="linkedin" class=" form-control mt-2"
                                            value="{{ $generalInfo->linkedin }}">
                                    </div>
                                    <div class="form-group col-lg-4 mt-2">
                                        <b>Twitter:</b>
                                        <input type="text" name="twitter" class=" form-control mt-2"
                                            value="{{ $generalInfo->twitter }}">
                                    </div>
                                    <div class="form-group col-lg-4 mt-2">
                                        <b>Youtube:</b>
                                        <input type="text" name="youtube" class=" form-control mt-2"
                                            value="{{ $generalInfo->youtube }}">
                                    </div>
                                    <div class="form-group col-lg-4 mt-2">
                                        <b>Tiktok:</b>
                                        <input type="text" name="tiktok" class=" form-control mt-2"
                                            value="{{ $generalInfo->tiktok }}">
                                    </div>


                                </div>
                                {{-- <div class="row mt-3">
                                    <div class="form-group col-lg-3">
                                        <b>Youtube:</b>
                                        <input type="text" name="youtube" class=" form-control mt-2"
                                            value="{{ $generalInfo->youtube }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>Pinterest:</b>
                                        <input type="text" name="pinterest" class=" form-control mt-2"
                                            value="{{ $generalInfo->pinterest }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>Google Plus:</b>
                                        <input type="text" name="google_plus" class=" form-control mt-2"
                                            value="{{ $generalInfo->google_plus }}">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <b>Vimeo:</b>
                                        <input type="text" name="vimeo" class=" form-control mt-2"
                                            value="{{ $generalInfo->vimeo }}">
                                    </div>
                                </div> --}}
                                <div class="form-group mt-2">
                                    <b>Copyright Text:</b>
                                    <input type="text" name="copyright_text" class=" form-control mt-2"
                                        value="{{ $generalInfo->copyright_text }}">
                                </div>

                                <div class="form-group mt-2">
                                    <b>Footer Description:</b>
                                    <textarea name="footer_des" class="form-control mt-2" rows="3">{{ $generalInfo->footer_des }}</textarea>
                                </div>
                               
                                <div class="form-group mt-2">
                                    <label>Address:</label>
                                    <textarea name="address" class="form-control " rows="7">{{ $generalInfo->address }}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Googel Tag:</label>
                                    <textarea name="google_tag" class="form-control " rows="7" id="google_tag">{{ $generalInfo->google_tag }}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Facebook Pixel:</label>
                                    <textarea name="facebook_pixel" class="form-control " rows="7" id="facebook_pixel">{{ $generalInfo->facebook_pixel }}</textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Facebook Messenger:</label>
                                    <textarea name="facebook_messenger" class="form-control " rows="7" id="facebook_messenger">{{ $generalInfo->facebook_messenger }}</textarea>
                                </div>
                                {{-- <div class="form-group mt-2">
                                    <label for="">Bullet Text:</label>
                                    <input type="text" name="bullet_text" class="form-control"
                                        placeholder="Enter Bullet Text" value="{{ $generalInfo->bullet_text }}">
                                </div>
                                <div class="form-group mt-2">
                                    <label>Bullet Content:</label>
                                    <textarea name="bullet_content" class="form-control" rows="7" placeholder="Enter Footer Description">{{ $generalInfo->bullet_content }}</textarea>
                                </div> --}}
                                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        CKEDITOR.replace('google_tag');
        CKEDITOR.replace('facebook_pixel');
        CKEDITOR.replace('facebook_messenger');
        CKEDITOR.replace('bullet_content');
    </script>
@endsection
@push('script')
    <script>
        function removeRow(image) {
            $("#hiddeen_event_photo").val("1");
            var row = image.closest('.property-image');

            row.parentNode.removeChild(row);
        }
    </script>
@endpush
