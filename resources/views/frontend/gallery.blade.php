<!-- Carousel box -->
<div class="carousel-box owl-wrapper">

    <div class="title-section">
        <h1><span>Gallery</span></h1>
    </div>

    <div class="owl-carousel" data-num="3">


        @foreach ($photoGallery as $pgData)
            <div class="item news-post image-post3">
                <a href="{{ route('photo_gallery',$pgData->slug) }}">
                  <img src="{{ $pgData->thumb_photo }}" alt="">
                </a>
                <div class="hover-box">
                    <h2><a href="{{ route('photo_gallery',$pgData->slug) }}">{{ $pgData->title }}</a></h2>
                </div>
            </div>
        @endforeach

    </div>
</div>
<!-- End carousel box -->
