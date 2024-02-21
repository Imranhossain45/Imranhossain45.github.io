<div class="widget block color-red m-bottom-0">
  <h3 class="block-title"><span>Featured Videos</span></h3>

  <div id="" class="">
    @foreach ($videoGallery as $video)
      <div class="item">
        <div class="post-overaly-style text-center clearfix">
          <div id="vimeo" onclick="">
            <div class="post-thumb">
              <img class="img-fluid featured_photo" src="{{ $video->photo }}" alt="{{ $video->alt_text }}" />
            </div><!-- Post thumb end -->

            <a href="{{ route('single_video', $video->slug) }}">
              <span class="featured_play_btn play_btn">
                <i class="fa-solid fa-play "></i>
              </span>
            </a>

            <div class="mb-3">
              <h3 class="post-title feature_photo_title text-left mb-0">
                <a href="{{ route('single_video', $video->slug) }}">{{ $video->title }}</a>
              </h3>
              <div class="post-meta text-left">
                <span class="post-date" style="color: #a3a3a3"><i class="fa-solid fa-calendar-days">
                  </i> {{ \Carbon\Carbon::parse($video->date)->format('d M Y h:i A') }}</span>
              </div>
            </div><!-- Post content end -->
          </div>
        </div><!-- Post Overaly Article 1 end -->
      </div><!-- Item 1 end -->
    @endforeach
  </div>

  <div class="ViewAll_main_div">
    <a href="{{ route('all_video_gallery') }}" class="view_all_btn">View All</a>
  </div>

</div><!-- Trending news end -->

@push('script')
  {{--  <script>
    function popupvideo(url) {
      $.magnificPopup.open({
        items: {
          src: url + '?autoplay=1', 
          type: 'iframe'
        }
      });
    }
  </script> --}}
@endpush
