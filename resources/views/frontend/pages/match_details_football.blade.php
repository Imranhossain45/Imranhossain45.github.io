@extends('layouts.frontend.master')
@section('content')
  <section class="block-wrapper page_sec_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
          <div class="block">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis accusamus nostrum ab id tempora, numquam
            doloremque reprehenderit dolores ipsam ducimus nemo praesentium natus! Ipsa dignissimos non obcaecati
            provident quasi nisi! Voluptate minus, dignissimos sequi eius possimus animi. Facere, autem dicta. Nisi autem
            nam dolorem voluptate unde alias quod ab natus.

            <div class="row mt-4">
              <div class="col-lg-6 mb_res">
                <div class="block">
                  <div class="d-flex">
                    <div>
                      <img src="{{ asset('frontend/img/Brazil.png') }}" class="mr-2" width="50" alt="">
                    </div>
                    <h4>Brazil</h4>
                  </div>
                  <div class="mt-3">
                    <div class="d-flex">
                      <div>
                        <img src="{{ asset('backend/images/default_profile.png') }}" class="team_img mr-2" width="40"
                          alt="">
                      </div>
                      <div>
                        <div class="player_name">Md Imran Hossain</div>
                        <span>Manager</span>
                      </div>
                      
                    </div>
                    <hr>
                    @for ($i=0;$i<=10;$i++)
                      <div class="d-flex">
                      <div>
                        <img src="{{ asset('backend/images/default_profile.png') }}" class="team_img mr-2" width="40"
                          alt="">
                      </div>
                      <div>
                        <div class="player_name">10 Md Imran Hossain</div>
                        <span><i class="fa-solid fa-code-compare"></i> 74' Out:Yousuf</span>
                      </div>
                      <div class="football_player_point">
                        6.7
                      </div>
                      
                    </div>
                    <hr>
                    @endfor
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="block">
                  <div class="d-flex">
                    <div>
                      <img src="{{ asset('frontend/img/argentina.jpg') }}" class="mr-2" width="50" alt="">
                    </div>
                    <h4>Argentina</h4>
                  </div>
                  <div class="mt-3">
                    <div class="d-flex">
                      <div>
                        <img src="{{ asset('backend/images/default_profile.png') }}" class="team_img mr-2" width="40"
                          alt="">
                      </div>
                      <div>
                        <div class="player_name">Md Imran Hossain</div>
                        <span>Manager</span>
                      </div>
                      
                    </div>
                    <hr>
                    @for ($i=0;$i<=10;$i++)
                      <div class="d-flex">
                      <div>
                        <img src="{{ asset('backend/images/default_profile.png') }}" class="team_img mr-2" width="40"
                          alt="">
                      </div>
                      <div>
                        <div class="player_name">10 Md Imran Hossain</div>
                        <span><i class="fa-solid fa-code-compare"></i> 74' Out:Yousuf</span>
                      </div>
                      <div class="football_player_point">
                        6.7
                      </div>
                      
                    </div>
                    <hr>
                    @endfor
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="gap-30"></div>
        </div>
        
        <div class="col-lg-3 col-md-3">
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
