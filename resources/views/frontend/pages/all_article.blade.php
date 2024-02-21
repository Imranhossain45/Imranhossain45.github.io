@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">


          <div class="row">
            @foreach ($articles as $news)
              <div class="col-lg-4 all_news_block">
                <div class="card">
                  <div class="all_news_card" style="overflow: hidden">
                    <a href="{{ route('news_details', $news->slug) }}">
                      <img src="{{ $news->photo }}" class="all_news_photo img-fluid" alt="">
                    </a>
                    <div class="post-content all_news_post_content">
                      <div class="post-tags" style="margin-top: 10px">
                        <div><i class="fa-solid fa-calendar-days"></i>
                          {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}
                        </div>
                        <div><i class="fa-solid fa-user"></i>
                          
                            {{ $news->auther }}
                        </div>
                      </div>
                      <div class="all_news_title">
                        <a href="{{ route('news_details', $news->slug) }}">
                          {{ $news->title }}
                        </a>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="pagination_links">
            {{ $articles->links() }}
          </div>

        </div>
        <div class="col-lg-3">
          @include('frontend.advertise.add1')
          <div class="gap-30"></div>
          @include('frontend.1st_block.featured_video')
          <div class="gap-30"></div>
        </div>
      </div>
    </div>
  </section>
@endsection
