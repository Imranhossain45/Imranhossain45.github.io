@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')

    <section class="photo_gallery_section section_pad_50 page_section_pad_50">
        <div class="container">
            <div class="gallery">
                <div class="row">
                    @if ($photoGallery->count() > 0)
                        @foreach ($photoGallery as $galleryItem)
                            @if ($galleryItem->photo)
                                @php
                                    $photoArray = explode(';', $galleryItem->photo);
                                @endphp
                                @foreach ($photoArray as $photoUrl)
                                    <div class="col-lg-3 photo_gallery_margin_bottom">
                                        <a href="{{ $photoUrl }}" class="big">
                                            <img src="{{ $photoUrl }}" class="img-fluid" alt="" title="">
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection
