@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
  <section class="page_section_pad_50" style="padding-bottom: 60px !important">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="block">
            <div class="row">
              <div class="col-lg-6 mb_res">
                @if ($about->url)
                  <div id="vimeo" onclick="popupvideo('{{ $about->url }}')">
                    <div class="post-thumb">

                      <img class="img-fluid" src="{{ $about->thumb_photo }}" alt="" />
                    </div><!-- Post thumb end -->

                    <span class="play_btn about_us_play_btn">
                      <i class="fa-solid fa-play "></i>
                    </span>
                  </div>
                @else
                  <div class="post-thumb">

                    <img class="img-fluid" src="{{ $about->photo }}" alt="" />
                  </div><!-- Post thumb end -->
                @endif
              </div>
              <div class="col-lg-6">
                {!! $about->description !!}
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="row mt-4 justify-content-center" style="background: #bc2324">
        <div class="core_member_text">
          What People Say About Us
        </div>
      </div>
      <div class="row mt-4">
        @foreach ($testimonials as $testimonial)
          <div class="col-lg-3 member_block_margin">
            <div class="block text-center">
              <div id="vimeo" onclick="popupvideo('{{ $testimonial->url }}')">
                <div class="post-thumb">

                  <img class="img-fluid" src="{{ $testimonial->photo }}" alt="" />
                </div><!-- Post thumb end -->

                <span class="play_btn" style="left: 45%">
                  <i class="fa-solid fa-play "></i>
                </span>
              </div>

            </div>
          </div>
        @endforeach

      </div>
      <div class="row mt-4 justify-content-center" style="background: #bc2324">
        <div class="core_member_text">
          Our Core Members
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-3 member_block_margin">
          <div class="block text-center">
            <div class="team text-center">
              <img src="{{ $founder->photo }}" class="team_img" alt="">
            </div>
            <div class="member_name">
              {{ $founder->name }}
            </div>
            <div class="team_designation">
              {{ $founder->designation }}
            </div>
            <div class="member_social mt-2">
              <a href=""><i class="fa-brands fa-facebook"></i></a>
              <a href=""><i class="fa-brands fa-instagram"></i></a>
              <a href=""><i class="fa-brands fa-twitter"></i></a>
              <a href=""><i class="fa-brands fa-linkedin"></i></a>
            </div>
          </div>
        </div>
        @foreach ($members as $member)
          <div class="col-lg-3 member_block_margin">
            <div class="block text-center">
              <div class="team text-center">
                <img src="{{ @$member->photo }}" class="team_img" alt="">
              </div>
              <div class="member_name">
                {{ @$member->name }}
              </div>
              <div class="team_designation">
                {{ @$member->designation }}
              </div>
              <div class="member_social mt-2">
                <a href=" {{ @$member->facebook }}"><i class="fa-brands fa-facebook"></i></a>
                <a href="{{ @$member->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                <a href="{{ @$member->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                <a href="{{ @$member->linkedin }}"><i class="fa-brands fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        @endforeach



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
