{{-- <div class="trending-bar d-md-block d-lg-block d-none">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="trending-title">Breaking News</h3>
                <div id="trending-slide" class="owl-carousel owl-theme trending-slide">
                    <div class="item">
                        <div class="post-content">
                            <h2 class="post-title title-small">
                                <a href="#">The best MacBook Pro alternatives in 2017 for Apple users</a>
                            </h2>
                        </div><!-- Post content end -->
                    </div><!-- Item 1 end -->
                    <div class="item">
                        <div class="post-content">
                            <h2 class="post-title title-small">
                                <a href="#">Soaring through Southern Patagonia with the Premium Byrd
                                    drone</a>
                            </h2>
                        </div><!-- Post content end -->
                    </div><!-- Item 2 end -->
                    <div class="item">
                        <div class="post-content">
                            <h2 class="post-title title-small">
                                <a href="#">Super Tario Run isn’t groundbreaking, but it has Mintendo
                                    charm</a>
                            </h2>
                        </div><!-- Post content end -->
                    </div><!-- Item 3 end -->
                </div><!-- Carousel end -->
            </div><!-- Col end -->
        </div><!--/ Row end -->
    </div><!--/ Container end -->
</div> --}}
{{-- <div class="gap-40"></div> --}}
<section class="featured-post-area no-padding banner_area">
  <div class="container">
    <div class="row">
     <img class="" src="{{ asset('frontend/img/banner-ads/ad-content-one.jpg') }}" alt="" />
      
    </div>
    <div class="gap-30"></div>
    <div class="row">
      <div class="col-lg-8 col-md-12 pad-r color-red">
        <h3 class="block-title"><span>Top News</span></h3>
        <div id="featured-slider" class="owl-carousel owl-theme featured-slider">

          @foreach ($topnews as $news)
            <div class="item" style="background-image:url({{ $news->photo }})">
              <div class="featured-post">
                <div class="post-content banner_post_content">
                  <a class="post-cat" href="#">{{ $news->category->name }}</a>
                  <h2 class="post-title title-extra-large">
                    <a href="#">{{ $news->title }}</a>
                  </h2>
                  <span class="post-date"><i class="fa-solid fa-calendar-days">
                    </i> {{ \Carbon\Carbon::parse($news->date)->format('d M Y h:i A') }}
                    <a href="" style="color: white;padding-left:10px" class="auther_name"><i
                        class="fa-solid fa-user"></i>
                      {{ $news->auther }}</a></span>
                </div>
              </div><!--/ Featured post end -->

            </div>
          @endforeach


        </div><!-- Featured owl carousel end-->
      </div><!-- Col 7 end -->

      <div class="col-lg-4 col-md-12 pad-l">
        <div class="color-red">
          <h3 class="block-title"><span>Trending Now</span></h3>
          <div class="row">
            @foreach ($trendingnews as $tnews)
              <div class="col-md-6 pad-r-small">
                <div class="post-overaly-style contentTop hot-post-bottom clearfix">
                  <div class="post-thumb treding_post_thumb">
                    <a href="#"><img class="img-fluid" src="{{ $tnews->photo }}" alt="" /></a>
                  </div>
                  <div class="post-content banner_post_content">
                    <a class="post-cat" href="#">{{ $tnews->category->name }}</a>
                    <h2 class="post-title title-medium trendin_news_margin">
                      <a href="#">{{ Str::limit($tnews->title, 50, '...') }}</a>
                    </h2>
                  </div><!-- Post content end -->
                </div><!-- Post Overaly end -->
              </div>
            @endforeach

          </div>
        </div>
      </div><!-- Col 5 end -->

    </div><!-- Row end -->
  </div><!-- Container end -->
</section><!-- Trending post end -->
