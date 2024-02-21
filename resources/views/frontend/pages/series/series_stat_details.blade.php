@extends('layouts.frontend.master')
@section('content')
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="block box_shadow">
            @if (isset($category) && $category === 'mostRuns')
              <h4 class="text-center">Most Runs</h4>
            @elseif(isset($category) && $category === 'mostWickets')
              <h4 class="text-center">Most Wickets</h4>
            @elseif(isset($category) && $category === 'mostSixes')
              <h4 class="text-center">Most Sixes</h4>
            @elseif(isset($category) && $category === 'mostFours')
              <h4 class="text-center">Most Fours</h4>
            @elseif(isset($category) && $category === 'highestScore')
              <h4 class="text-center">Highest Score</h4>
            @else
              <h4 class="text-center">Best Bowling Figure</h4>
            @endif

            <div class="table-responsive">
              <div id="series_stat_data_full">
                <div class="text-center">
                  <center>
                    <div class="lds-spinner">
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                  </center>
                </div>
              </div>


            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3">
          <div class="news_details_v_p">
            @include('frontend.1st_block.featured_video')
            <div class="gap-30"></div>
            @include('frontend.1st_block.featured_photo')
            <div class="gap-30"></div>
          </div>
          <div class="sidebar sidebar-right">

            <div class="widget text-center">
              <img class="banner img-fluid" src="{{ asset('frontend/img/banner-ads/ad-sidebar.png') }}" alt="" />
            </div><!-- Sidebar Ad end -->
            <div class="widget color-red">
              <h3 class="block-title"><span>Latest News</span></h3>


              <div class="list-post-block block">
                <ul class="list-post">
                  @foreach ($latest_news as $lnews)
                    <li class="clearfix">
                      <div class="post-block-style post-float clearfix ">
                        <div class="post-thumb">
                          <a href="{{ route('news_details', $lnews->slug) }}">
                            <img class="img-fluid news_details_lnews_img" src="{{ $lnews->photo }}"
                              alt="{{ $lnews->alt_text }}" />
                          </a>
                          <a class="post-cat" href="#">{{ $lnews->category->name }}</a>
                        </div><!-- Post thumb end -->

                        <div class="post-content">
                          <h2 class="post-title title-small">
                            <a href="#">{{ $lnews->title }}</a>
                          </h2>
                          {{-- <div class="post-meta">
                                                    <span class="post-date">
                                                        <i class="fa-solid fa-calendar-days">
                                                    </i> {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y h:i A')  }}
                                                    <a href="" style="color: #a3a3a3;padding-left:10px" class="auther_name"><i class="fa-solid fa-user"></i>
                                                        {{ $news->auther }}</a></span>
                                                </div> --}}
                        </div><!-- Post content end -->
                      </div><!-- Post block style end -->
                    </li><!-- Li 1 end -->
                    <hr>
                  @endforeach
                  <div class="ViewAll_main_div">
                    <a href="{{ route('all_news') }}" class="view_all_btn">View All</a>
                  </div>
                </ul><!-- List post end -->
              </div><!-- List post block end -->

            </div><!-- Popular news widget end -->
            @include('frontend.1st_block.follow_us')

            <div class="widget text-center">
              <img class="banner img-fluid" src="images/banner-ads/ad-sidebar.png" alt="" />
            </div><!-- Sidebar Ad end -->



          </div><!-- Sidebar right end -->
        </div><!-- Sidebar Col end -->
      </div>
    </div>
  </section>
@endsection
@push('script')
  <script>
    function series_stat_data_full() {

      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('series_stat_data_full') }}",
        type: "POST",
        data: {
          seriesId: '{{ $seriesId }}',
          category: '{{ $category }}',
          '_token': '{{ csrf_token() }}',
        },
        success: function(response) {
          if (response.success) {
            $('#series_stat_data_full').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    $(document).ready(() => {
      series_stat_data_full();
    });
  </script>
@endpush
