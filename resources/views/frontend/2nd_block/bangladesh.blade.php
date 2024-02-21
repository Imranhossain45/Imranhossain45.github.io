<div class="block color-red">
  <h3 class="block-title"><span>Bangladesh</span></h3>

  <div class="row">
    <div class="col-lg-12 col-md-12">

      @foreach ($bdnews as $index => $news)
        @if ($index == 0)
          <div class="post-overaly-style clearfix">
            <div class="post-thumb">
              <a href="{{ route('news_details', $news->slug) }}">
                <img class="img-fluid" src="{{ $news->photo }}" alt="{{ $news->alt_text }}" />
              </a>
            </div>

            <div class="post-content single_photo_part_post_content">
              <a class="post-cat" href="{{ route('category', $news->category->slug) }}">{{ $news->category->name }}</a>
              <h2 class="post-title title-extra-large">
                <a href="{{ route('news_details', $news->slug) }}">{{ Str::limit($news->title, 110, '...') }}</a>
              </h2>
              <div class="post-meta">
                <span class="post-date"><i class="fa-solid fa-calendar-days">
                  </i> {{ \Carbon\Carbon::parse($news->date)->format('d M Y h:i A') }}
                  <a href="{{ route('journalist', $news->journalist->slug) }}" style="color: white;padding-left:10px"
                    class="auther_name_home"><i class="fa-solid fa-user"></i>
                    {{ $news->journalist->name }}</a></span>
              </div>
              <div>
                 <a href="{{ route('news_details',$news->slug) }}">{!! Str::limit($news->description, 330, '...') !!}</a>
              </div>
            </div><!-- Post content end -->
          </div><!-- Post Overaly Article end -->
        @endif
      @endforeach

      <div class="list-post-block">
        <ul class="list-post">
          @foreach ($bdnews as $index => $news)
            @if ($index != 0)
              <li class="clearfix">
                <div class="post-block-style post-float clearfix">
                  <div class="post-thumb">
                    <a href="{{ route('news_details', $news->slug) }}">
                      <img class="img-fluid" src="{{ $news->photo }}" alt="{{ $news->alt_text }}" />
                    </a>
                    <a class="post-cat"
                      href="{{ route('category', $news->category->slug) }}">{{ $news->category->name }}</a>
                  </div><!-- Post thumb end -->

                  <div class="post-content ">
                    <h2 class="post-title title-small">
                      <a href="{{ route('news_details', $news->slug) }}">{{ Str::limit($news->title, 110, '...') }}
                      </a>
                    </h2>
                    <div class="post-meta">
                      <span class="post-date"><i class="fa-solid fa-calendar-days">
                        </i> {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y h:i A') }}
                        <a href="{{ route('journalist', $news->journalist->slug) }}"
                          style="color: #a3a3a3;padding-left:10px" class="auther_name auther_name_home"><i class="fa-solid fa-user"></i>
                          {{ $news->journalist->name }}</a></span>
                    </div>
                    <div>
                       <a href="{{ route('news_details',$news->slug) }}">{!! Str::limit($news->description, 170, '...') !!}</a>
                    </div>
                  </div><!-- Post content end -->
                </div><!-- Post block style end -->
              </li><!-- Li 1 end -->
            @endif
          @endforeach


        </ul><!-- List post end -->
      </div><!-- List post block end -->
    </div><!-- Col 1 end -->


  </div><!-- Row end -->
  <div class="ViewAll_main_div">
    <a href="{{ route('all_news') }}" class="view_all_btn">View All</a>
  </div>
</div><!-- Block Lifestyle end -->
