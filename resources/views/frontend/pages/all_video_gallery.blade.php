@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        @foreach ($videoGallery as $video)
          <div class="col-lg-3">
            <div class="post-overaly-style text-center clearfix block">
              <div id="vimeo" onclick="popupvideo('{{ $video->video }}')">
                <div class="post-thumb">

                  <img class="img-fluid featured_photo" src="{{ $video->photo }}" alt="{{ $video->alt_text }}" />
                </div><!-- Post thumb end -->

                <a href="{{ route('single_video', $video->slug) }}">
                  <span class="featured_play_btn play_btn">
                    <i class="fa-solid fa-play "></i>
                  </span>
                </a>

                <div class="post-content all_videos_post_content">
                  <h2 class="post-title feature_photo_title text-left mb-0">
                    <a href="{{ route('single_video', $video->slug) }}">{{ $video->title }}</a>
                  </h2>
                  <div class="post-meta text-left">
                    <span class="post-date" style="color: #a3a3a3"><i class="fa-solid fa-calendar-days">
                      </i> {{ \Carbon\Carbon::parse($video->date)->format('d M Y h:i A') }}</span>
                  </div>

                </div><!-- Post content end -->
              </div>

            </div><!-- Post Overaly Article 1 end -->
          </div>
        @endforeach
      </div>
      <div class="pagination_links">
        {{ $videoGallery->links() }}
      </div>
    </div>
  </section>
@endsection
@push('script')
  <script>
    function popupvideo(url) {
      $.magnificPopup.open({
        items: {
          src: url,
          type: 'iframe'
        }
      });
    }
  </script>
@endpush
