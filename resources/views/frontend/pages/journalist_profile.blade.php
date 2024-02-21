@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 member_block_margin">
          <div class="block text-center">
            <div class="team text-center">
              <img src="{{ $journalist->photo }}" class="team_img" alt="">
            </div>
            <div class="member_name">
              {{ $journalist->name }}
            </div>
            <div class="team_designation">
              {{ $journalist->designation }}
            </div>
            <div class="member_social mt-2">
              <a href="{{ $journalist->facebook }}"><i class="fa-brands fa-facebook"></i></a>
              <a href="{{ $journalist->instagram }}"><i class="fa-brands fa-instagram"></i></a>
              <a href="{{ $journalist->twitter }}"><i class="fa-brands fa-twitter"></i></a>
              <a href="{{ $journalist->linked_in }}"><i class="fa-brands fa-linkedin"></i></a>
            </div>
          </div>
          <div class="block mt-3 journalist_news_part">
            <div class="list-post-block">
              <ul class="list-post">
                @foreach ($lnews as $index => $news)
                  <li class="clearfix">
                    <div class="post-block-style post-float clearfix sidebar_news_part">
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
                      </div><!-- Post content end -->
                    </div><!-- Post block style end -->
                  </li><!-- Li 1 end -->
                @endforeach


              </ul><!-- List post end -->
            </div><!-- List post block end -->
            <div class="ViewAll_main_div mt-4">
              <a href="{{ route('journalist',$journalist->slug) }}" class="view_all_btn">View All</a>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          {!! $journalist->description !!}
        </div>

      </div>
    </div>
  </section>
@endsection
