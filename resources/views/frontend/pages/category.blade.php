@extends('layouts.frontend.master')
@section('content')
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="row">
            @foreach ($newses as $news)
              <div class="col-lg-4 all_news_block">
                <div class="card">
                  <div class="all_news_card" style="overflow: hidden">
                    <a href="{{ route('news_details', $news->slug) }}">
                      <img src="{{ $news->photo }}" class="all_news_photo img-fluid" alt="">
                    </a>
                    <div class="post-content">
                      <div class="post-tags" style="margin-top: 10px">
                        <div><i class="fa-solid fa-calendar-days"></i>
                          {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y h:i A') }}
                        </div>
                        <div><i class="fa-solid fa-user"></i>
                          <a href="#">
                            {{ $news->auther }}</a>
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
            {{ $newses->links() }}
          </div>

        </div>
        <div class="col-lg-3">
          @include('frontend.1st_block.featured_video')
          <div class="gap-30"></div>
        </div>
      </div>
    </div>
  </section>
@endsection
