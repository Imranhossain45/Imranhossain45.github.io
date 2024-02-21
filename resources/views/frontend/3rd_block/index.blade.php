<section class="block-wrapper p-bottom-0 pt-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        {{-- <div class="sidebar sidebar-right">
                  @include('frontend.1st_block.featured_video')   
                  <div class="gap-30"></div>      
                  @include('frontend.1st_block.featured_photo')   
                  <div class="gap-30"></div>  
                </div><!-- Sidebar right end --> --}}
      </div><!-- Sidebar Col end -->
      <div class="col-lg-6 col-md-16">
        <div class="more-news block color-red page_section_res">
          <h3 class="block-title"><span>Latest Article</span></h3>

          <div id="more-news-slide" class="owl-carousel owl-theme more-news-slide">
            @foreach ($articles->chunk(6) as $chunk)
              <div class="item">
                @foreach ($chunk as $article)
                  <div class="post-block-style post-float clearfix">
                    <div class="post-thumb">
                      <a href="{{ route('blog_details',$article->slug) }}">
                        <img class="img-fluid" src="{{ $article->photo }}" alt="{{ $article->alt_text }}" />
                      </a>
                    </div>
                    <div class="post-content">
                      <h2 class="post-title latest_article_title">
                        <a href="{{ route('blog_details',$article->slug) }}">{{ Str::limit($article->title, 110, '...') }}</a>
                      </h2>
                      <div class="post-meta">
                        <span class="post-date">
                          <i class="fa-solid fa-calendar-days">
                          </i> {{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}
                          <a href="" style="color: #a3a3a3;padding-left:10px" class="auther_name auther_name_home"><i
                              class="fa-solid fa-user"></i>
                            {{ $article->auther }}</a></span>
                      </div>
                      <div>
                        {!! Str::limit($article->description, 170, '...') !!}
                      </div>
                    </div><!-- Post content end -->
                  </div><!-- Post Block style 1 end -->

                  <div class="gap-30"></div>
                @endforeach
              </div><!-- Item 1 end -->
            @endforeach


          </div><!-- More news carousel end -->
          <div class="ViewAll_main_div">
            <a href="{{ route('all_article') }}" class="view_all_btn">View All</a>
          </div>
        </div><!--More news block end -->
      </div><!-- Content Col end -->


      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="sidebar sidebar-right page_section_res">



          {{-- <div class="widget color-default">
                        <h3 class="block-title"><span>Latest Reviews</span></h3>
                        <div class="list-post-block">
                            <ul class="list-post review-post-list">
                                <li class="clearfix">
                                    <div class="post-block-style post-float clearfix">
                                        <div class="post-thumb">
                                            <a href="#">
                                                <img class="img-fluid" src="images/news/review/review1.jpg"
                                                    alt="" />
                                            </a>
                                        </div><!-- Post thumb end -->

                                        <div class="post-content">
                                            <h2 class="post-title">
                                                <a href="#">Topical Resorts you need to know</a>
                                            </h2>
                                            <div class="post-meta">
                                                <div class="review-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div><!-- Post meta end -->
                                        </div><!-- Post content end -->
                                    </div><!-- Post block style end -->
                                </li><!-- Li 1 end -->

                                <li class="clearfix">
                                    <div class="post-block-style post-float clearfix">
                                        <div class="post-thumb">
                                            <a href="#">
                                                <img class="img-fluid" src="images/news/review/review2.jpg"
                                                    alt="" />
                                            </a>
                                        </div><!-- Post thumb end -->

                                        <div class="post-content">
                                            <h2 class="post-title">
                                                <a href="#">Apple - MacBook Pro with Retina display</a>
                                            </h2>
                                            <div class="post-meta">
                                                <div class="review-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </div><!-- Post content end -->
                                    </div><!-- Post block style end -->
                                </li><!-- Li 2 end -->

                                <li class="clearfix">
                                    <div class="post-block-style post-float clearfix">
                                        <div class="post-thumb">
                                            <a href="#">
                                                <img class="img-fluid" src="images/news/review/review3.jpg"
                                                    alt="" />
                                            </a>
                                        </div><!-- Post thumb end -->

                                        <div class="post-content">
                                            <h2 class="post-title">
                                                <a href="#">Asus ZenPad 3S 10 Z500M</a>
                                            </h2>
                                            <div class="post-meta">
                                                <div class="review-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </div><!-- Post content end -->
                                    </div><!-- Post block style end -->
                                </li><!-- Li 3 end -->

                                <li class="clearfix">
                                    <div class="post-block-style post-float clearfix">
                                        <div class="post-thumb">
                                            <a href="#">
                                                <img class="img-fluid" src="images/news/review/review4.jpg"
                                                    alt="" />
                                            </a>
                                        </div><!-- Post thumb end -->

                                        <div class="post-content">
                                            <h2 class="post-title">
                                                <a href="#">Polar M600 GPS Smart Sports Watch</a>
                                            </h2>
                                            <div class="post-meta">
                                                <div class="review-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </div><!-- Post content end -->
                                    </div><!-- Post block style end -->
                                </li><!-- Li 4 end -->

                            </ul><!-- List post end -->
                        </div><!-- List post block end -->
                    </div>

                    <div class="widget m-bottom-0">
                        <h3 class="block-title"><span>Newsletter</span></h3>
                        <div class="ts-newsletter">
                            <div class="newsletter-introtext">
                                <h4>Get Updates</h4>
                                <p>Subscribe our newsletter to get the best stories into your inbox!</p>
                            </div>

                            <div class="newsletter-form">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <input type="email" name="email" id="newsletter-form-email"
                                            class="form-control form-control-lg" placeholder="E-mail"
                                            autocomplete="off">
                                        <button class="btn btn-primary">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- Newsletter end -->
                    </div> --}}
        </div><!--Sidebar right end -->
      </div><!-- Sidebar col end -->
    </div><!-- Row end -->
  </div><!-- Container end -->
</section><!-- 3rd block end -->
<div class="gap-40"></div>
<div class="gap-40"></div>
{{-- <section class="ad-content-area text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img class="img-fluid" src="{{asset('frontend/img/banner-ads/ad-content-two.png')}}" alt="" />
            </div><!-- Col end -->
        </div><!-- Row end -->
    </div>
</section> --}}
