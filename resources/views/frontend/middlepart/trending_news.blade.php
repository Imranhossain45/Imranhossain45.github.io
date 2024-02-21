<div class="block color-red">
    <h3 class="block-title"><span>Trending Now</span></h3>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            
          

            <div class="list-post-block">
                <ul class="list-post">
                    @foreach ($trendingnews as $index => $news)
                       
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
                                    <h2 class="post-title title-small">
                                        <a href="{{ route('news_details',$news->slug) }}">{{ Str::limit($news->title, 80, '...') }}
                                        </a>
                                    </h2>
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
