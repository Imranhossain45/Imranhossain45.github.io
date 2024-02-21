<div class="widget features-slide-widget">
    <div class="title-section">
        <h1><span>Featured Photos</span></h1>
    </div>
    <div class="image-post-slider">
        <ul class="bxslider">

            @foreach ($photoGallery as $pgData)
                <li>
                    <div class="news-post image-post2">
                        <div class="post-gallery">
                            <a href="{{ route('photo_gallery', $pgData->slug) }}">
                                <img src="{{ $pgData->thumb_photo }}" alt="">
                            </a>
                            <div class="hover-box">
                                <div class="inner-hover">
                                    <h2><a href="{{ route('photo_gallery', $pgData->slug) }}">{{ $pgData->title }}</a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="center-button">
        <a href="{{ route('all_photo_gallery') }}"> More featured  Photos</a>
    </div>

</div>
