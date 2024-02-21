<div class="widget block color-red m-bottom-0">
    <h3 class="block-title"><span>Featured Photos</span></h3>

    <div id="post-slide" class="owl-carousel owl-theme post-slide">
        @foreach ($photoGallery as $photo)
        <div class="item">
            <div class="post-overaly-style text-center clearfix">
                <a href="{{route('photo_gallery',$photo->slug)}}">
                    <div class="post-thumb">

                        <img class="img-fluid featured_photo" src="{{ $photo->thumb_photo }}" alt="{{ $photo->thumb_alt_text }}" />
                    </div><!-- Post thumb end -->

                    

                    <div class="">
                        <h2 class="post-title feature_photo_title">
                            <a href="{{route('photo_gallery',$photo->slug)}}">{{ $photo->title }}</a>
                        </h2>

                    </div><!-- Post content end -->
                </a>

            </div><!-- Post Overaly Article 1 end -->



        </div><!-- Item 1 end -->
        @endforeach


    </div><!-- Post slide carousel end -->
    <div class="ViewAll_main_div">
        <a href="{{route('all_photo_gallery')}}" class="view_all_btn">View All</a>
    </div>

</div><!-- Trending news end -->
