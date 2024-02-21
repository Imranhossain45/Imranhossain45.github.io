
{{-- <div class="latest-news block color-red">
    <h3 class="block-title"><span>Latest News</span></h3>
    <div id="latest-news-slide" class="owl-carousel owl-theme latest-news-slide" style="width: 100%">
       

        @foreach ($lnews->chunk(6) as $chunk)
       
            <div class="item">
                <ul class="list-post">
                    @foreach ($chunk as $news)
                    <li class="clearfix">
                        <div class="post-block-style post-float clearfix">
                            <div class="post-thumb">
                                <a href="#">
                                    <img class="img-fluid" src="{{ $news->photo }}"
                                        alt="" />
                                </a>
                                <a class="post-cat" href="#">{{ $news->category->name }}</a>
                            </div><!-- Post thumb end -->

                            <div class="post-content">
                                <h2 class="post-title title-small">
                                    <a href="{{route('news_details',$news->slug)}}">{{ Str::limit($news->title, 110, '...') }}
                                    </a>
                                </h2>
                                <div class="post-meta">
                                    <span class="post-date">
                                        <i class="fa-solid fa-calendar-days">
                                    </i> {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y h:i A')  }}
                                    <a href="" style="color: #a3a3a3;padding-left:10px" class="auther_name"><i class="fa-solid fa-user"></i>
                                        {{ $news->auther }}</a></span>
                                </div>
                                <div>
                                    {!! Str::limit($news->description, 210, '...') !!}
                                </div>
                            </div><!-- Post content end -->
                        </div><!-- Post block style end -->
                    </li><!-- Li 1 end -->
                    @endforeach
                   

                    

                </ul><!-- List post end -->

            </div>
        @endforeach


    </div><!-- Latest News owl carousel end-->
</div><!--- Latest news end --> --}}
<div class="block color-red">
    <h3 class="block-title"><span>Latest News</span></h3>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            
          

            <div class="list-post-block">
                <ul class="list-post">
                    @foreach ($lnews as $index => $news)
                       
                        <li class="clearfix">
                            <div class="post-block-style post-float clearfix sidebar_news_part">
                                <div class="post-thumb">
                                    <a href="{{ route('news_details',$news->slug) }}">
                                        <img class="img-fluid"
                                            src="{{ $news->photo }}" alt="{{ $news->alt_text }}" />
                                    </a>
                                    <a class="post-cat" href="{{ route('category',$news->category->slug) }}">{{ $news->category->name }}</a>
                                </div><!-- Post thumb end -->

                                <div class="post-content ">
                                    <h3 class="post-title title-small">
                                        <a href="{{ route('news_details',$news->slug) }}">{{ Str::limit($news->title, 80, '...') }}
                                        </a>
                                    </h3>
                                </div><!-- Post content end -->
                            </div><!-- Post block style end -->
                        </li><!-- Li 1 end -->
                    
                    @endforeach


                </ul><!-- List post end -->
            </div><!-- List post block end -->
        </div><!-- Col 1 end -->


    </div><!-- Row end -->
    <div class="ViewAll_main_div mt-4">
        <a href="{{ route('all_news') }}" class="view_all_btn">View All</a>
    </div>
</div><!-- Block Lifestyle end -->

