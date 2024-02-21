@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
  <section class="block-wrapper page_sec_pad_50 page_section_res">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 news_details_left_side">
          @include('frontend.1st_block.featured_video')
          <div class="gap-30"></div>
          @include('frontend.1st_block.featured_photo')
        </div><!-- Sidebar Col end -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">

          <div class="single-post block">

            <div class="post-title-area">

              <h2 class="post-title">
                {{ $news->title }}
              </h2>
              <div class="post-meta">
                <span class="post-date">
                  <i class="fa-solid fa-calendar-days">
                  </i> {{ \Carbon\Carbon::parse($news->date)->format('d M Y h:i A') }}
                  <a href="{{ route('journalist', $news->journalist->slug) }}" style="color: #a3a3a3;padding-left:10px"
                    class="auther_name">
                    {{-- <i class="fa-solid fa-user"></i> --}}
                    <img src="{{ $news->journalist->photo }}" width="20" alt="">
                    {{ $news->journalist->name }}</a></span>
              </div>
            </div><!-- Post title end -->

            <div class="post-content-area">
              <div class="post-media post-featured-image">
                <a class="post-cat" href="{{ route('category', $news->category->slug) }}">{{ $news->category->name }}</a>
                <a href="{{ $news->photo }}" class="gallery-popup">
                  <img src="{{ $news->photo }}" class="img-fluid" alt="{{ $news->alt_text }}">
                </a>
              </div>
              <div class="entry-content">
                <div>{!! $news->description !!}</div>


              </div><!-- Entery content end -->



              <div class="share-items clearfix">
                <ul class="post-social-icons unstyled">
                  <li>
                    <span>Share:</span>
                  </li>
                  <li class="facebook">
                    <a href="https://www.facebook.com/share.php?u={{ $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] }}"
                      target="_blank">
                      <i class="fa-brands fa-facebook"></i></a>
                  </li>
                  <li class="twitter">
                    <a href="http://www.twitter.com/share?url={{ $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] }}"
                      target="_blank">
                      <i class="fa-brands fa-twitter"></i></a>
                  </li>
                  {{-- <li class="gplus">
                    <a href="#">
                      <i class="fa-brands fa-instagram"></i></a>
                  </li> --}}
                  <li class="facebook">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] }}"
                      target="_blank">
                      <i class="fa-brands fa-linkedin"></i></a>
                  </li>

                </ul>
              </div><!-- Share items end -->

            </div><!-- post-content end -->
          </div><!-- Single post end -->
          <div class="gap-30"></div>


          {{-- <div class="author-box">
                        <div class="author-img pull-left">
                            <img src="images/news/author.png" alt="">
                        </div>
                        <div class="author-info">
                            <h3>Razon Khan</h3>
                            <div class="author-url"><a href="#">http://www.newsdaily247.com</a></div>
                            <div>Selfies labore, leggings cupidatat sunt taxidermy umami fanny pack typewriter hoodie art
                                party voluptate. Listicle meditation paleo, drinking vinegar sint direct trade.</div>
                            <div class="authors-social">
                                <span>Follow Me: </span>
                                <a href="#"><i class="fa fa-behance"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div> <!-- Author box end --> --}}

          <div class="related-posts block">
            <h3 class="block-title"><span>Related News</span></h3>

            <div id="related-news-slide" class="owl-carousel owl-theme related-news-slide">
              @foreach ($related_news as $rnews)
                <div class="item">
                  <div class="post-block-style clearfix">
                    <div class="post-thumb">
                      <a href="{{ route('news_details', $rnews->slug) }}"><img class="img-fluid"
                          src="{{ $rnews->photo }}" alt="{{ $rnews->alt_text }}" /></a>
                    </div>
                    <a class="post-cat"
                      href="{{ route('category', $rnews->category->slug) }}">{{ $rnews->category->name }}</a>
                    <div class="post-content">
                      <h2 class="post-title title-medium">
                        <a href="{{ route('news_details', $rnews->slug) }}">{{ $rnews->title }}</a>
                      </h2>
                      <div class="post-meta">
                        <span class="post-date">
                          <i class="fa-solid fa-calendar-days">
                          </i>
                          {{ \Carbon\Carbon::parse($rnews->date)->format('d M Y h:i A') }}
                        </span>
                        <span class="post-date">
                          <a href="{{ route('journalist', $rnews->journalist->slug) }}"
                            style="color: #a3a3a3;padding-left:10px" class="auther_name"><i class="fa-solid fa-user"></i>
                            {{ $rnews->journalist->name }}</a></span>
                      </div>
                    </div><!-- Post content end -->
                  </div><!-- Post Block style end -->
                </div><!-- Item 1 end -->
              @endforeach


            </div><!-- Carousel end -->

          </div><!-- Related posts end -->

          <div class="gap-30"></div>

        </div><!-- Content Col end -->



        <div class="col-lg-3 col-md-3">
          <div class="news_details_v_p">
            @include('frontend.1st_block.featured_video')
            <div class="gap-30"></div>
            @include('frontend.1st_block.featured_photo')
            <div class="gap-30"></div>
          </div>
          @include('frontend.advertise.add1')
          <div class="gap-30"></div>
          <div class="sidebar sidebar-right">


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
                          <a class="post-cat" href="{{ route('category',$news->category->slug) }}">{{ $lnews->category->name }}</a>
                        </div><!-- Post thumb end -->

                        <div class="post-content">
                          <h2 class="post-title title-small">
                            <a href="{{ route('news_details',$news->slug) }}">{{ $lnews->title }}</a>
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




          </div><!-- Sidebar right end -->
        </div><!-- Sidebar Col end -->

      </div><!-- Row end -->
    </div><!-- Container end -->
  </section><!-- First block end -->
@endsection
