@extends('layouts.frontend.master')
@section('content')
  <section class="page_section_pad_50">
    {{-- <div>
       <iframe width="560" height="315" src="https://www.youtube.com/embed/aEw-gKSS1eY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div> --}}
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="block">
            <div class="video-container">
              <iframe frameborder="0" allowfullscreen=""
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                title="চিৎকার করে তামিমকে পেস বল না খেলার পরামর্শ রিয়াদের, তামিমও রাখলেন বড় ভাইয়ের কথা | Tamim | Riyad"
                width="100%" height="100%"
                src="https://www.youtube.com/embed/{{ $single_video->video_id }}?autoplay=1&amp;mute=0&amp;controls=1&amp;playsinline=1&amp;showinfo=1&amp;rel=0&amp;iv_load_policy=3&amp;modestbranding=1&amp;enablejsapi=1&amp;widgetid=3"></iframe>
            </div>

          </div>
          <div class="block mt-5">
            <h2 class="text-center">Related Video</h2>
            <div class="row mt-3">

              @foreach ($related_video as $video)
                <div class="col-lg-4">
                  <div class="block">
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
                  </div><!-- Item 1 end -->
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3">
          <div class="">
            @include('frontend.advertise.add1')
            <div class="gap-30"></div>
            @include('frontend.1st_block.featured_photo')
          </div>
        </div><!-- Sidebar Col end -->
      </div>
    </div>
  </section>
@endsection
