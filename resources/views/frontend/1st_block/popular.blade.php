<!--- Featured Tab startet -->
<div class="featured-tab color-red block">
  <h3 class="block-title"><span>Popular News</span></h3>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link animated fadeIn active" href="#tab_a" data-toggle="tab">
        <span class="tab-head">
          <span class="tab-text-title">Cricket</span>
        </span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link animated fadeIn" href="#tab_b" data-toggle="tab">
        <span class="tab-head">
          <span class="tab-text-title">Football</span>
        </span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link animated fadeIn" href="#tab_c" data-toggle="tab">
        <span class="tab-head">
          <span class="tab-text-title">Others</span>
        </span>
      </a>
    </li>
  </ul>

  <div class="tab-content">
    <div class="tab-pane active animated fadeInRight" id="tab_a">
      <div class="row">


        <div class="col-lg-12 col-md-12">
          <div class="list-post-block">
            <ul class="list-post">
              @foreach ($poplarnews_cric as $news)
                <li class="clearfix">
                <div class="post-block-style post-float clearfix">
                  <div class="post-thumb">
                    <a href="{{ route('news_details',$news->slug) }}">
                      <img class="img-fluid" src="{{ @$news->photo }}" alt="" />
                    </a>
                    <a class="post-cat" href="{{ route('category',$news->category->slug) }}">{{ $news->category->name }}</a>
                  </div><!-- Post thumb end -->

                  <div class="post-content">
                    <h2 class="post-title title-small">
                      <a href="{{ route('news_details',$news->slug) }}">{{ Str::limit($news->title, 110, '...') }}</a>
                    </h2>
                    <div class="post-meta">
                      <span class="post-date"><i class="fa-solid fa-calendar-days">
                        </i> {{ \Carbon\Carbon::parse($news->date)->format('d M Y h:i A') }}
                        <a href="" style="color: #a3a3a3;padding-left:10px" class="auther_name auther_name_home"><i
                            class="fa-solid fa-user"></i>
                          {{ $news->journalist->name }}</a></span>
                    </div>
                  </div><!-- Post content end -->
                </div><!-- Post block style end -->
              </li><!-- Li 1 end -->
              @endforeach

              
            
            </ul><!-- List post end -->
          </div><!-- List post block end -->
        </div><!-- List post Col end -->
      </div><!-- Tab pane Row 1 end -->
    </div><!-- Tab pane 1 end -->

    <div class="tab-pane animated fadeInRight" id="tab_b">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="list-post-block">
            <ul class="list-post">
               @foreach ($poplarnews_foot as $news)
                <li class="clearfix">
                <div class="post-block-style post-float clearfix">
                  <div class="post-thumb">
                    <a href="{{ route('news_details',$news->slug) }}">
                      <img class="img-fluid" src="{{ @$news->photo }}" alt="" />
                    </a>
                    <a class="post-cat" href="{{ route('category',$news->category->slug) }}">{{ $news->category->name }}</a>
                  </div><!-- Post thumb end -->

                  <div class="post-content">
                    <h2 class="post-title title-small">
                      <a href="{{ route('news_details',$news->slug) }}">{{ Str::limit($news->title, 110, '...') }}</a>
                    </h2>
                    <div class="post-meta">
                      <span class="post-date"><i class="fa-solid fa-calendar-days">
                        </i> {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y h:i A') }}
                        <a href="" style="color: #a3a3a3;padding-left:10px" class="auther_name auther_name_home"><i
                            class="fa-solid fa-user"></i>
                          {{ $news->journalist->name }}</a></span>
                    </div>
                  </div><!-- Post content end -->
                </div><!-- Post block style end -->
              </li><!-- Li 1 end -->
              @endforeach


            </ul><!-- List post end -->
          </div><!-- List post block end -->
        </div><!-- List post Col end -->
      </div><!-- Tab pane Row 2 end -->
    </div><!-- Tab pane 2 end -->

    <div class="tab-pane animated fadeInLeft" id="tab_c">

      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="list-post-block">
            <ul class="list-post">
              @foreach ($popularnews_other as $news)
                <li class="clearfix">
                <div class="post-block-style post-float clearfix">
                  <div class="post-thumb">
                    <a href="{{ route('news_details',$news->slug) }}">
                      <img class="img-fluid" src="{{ @$news->photo }}" alt="" />
                    </a>
                    <a class="post-cat" href="{{ route('category',$news->category->slug) }}">{{ $news->category->name }}</a>
                  </div><!-- Post thumb end -->

                  <div class="post-content">
                    <h2 class="post-title title-small">
                      <a href="{{ route('news_details',$news->slug) }}">{{ Str::limit($news->title, 110, '...') }}</a>
                    </h2>
                    <div class="post-meta">
                      <span class="post-date"><i class="fa-solid fa-calendar-days">
                        </i> {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y h:i A') }}
                        <a href="" style="color: #a3a3a3;padding-left:10px" class="auther_name auther_name_home"><i
                            class="fa-solid fa-user"></i>
                          {{ $news->journalist->name }}</a></span>
                    </div>
                  </div><!-- Post content end -->
                </div><!-- Post block style end -->
              </li><!-- Li 1 end -->
              @endforeach

            </ul><!-- List post end -->
          </div><!-- List post block end -->
        </div><!-- List post Col end -->
      </div><!-- Tab pane Row 3 end -->
    </div><!-- Tab pane 3 end -->
  </div><!-- tab content -->
</div><!-- Technology Tab end -->
