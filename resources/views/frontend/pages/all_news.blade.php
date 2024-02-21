@extends('layouts.frontend.master', [
    'title' => $metaData->title ? $metaData->title : ($metaData->name ? $metaData->name : env('APP_NAME')),
    'description' => $metaData->description ?? env('APP_NAME')
])

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
                    <div class="post-content all_news_post_content">
                      <div class="post-tags all_news_block_post_tag" style="margin-top: 10px">
                        <div class="news_date"><i class="fa-solid fa-calendar-days"></i>
                          {{ \Carbon\Carbon::parse($news->date)->format('d M Y h:i A') }}
                        </div>
                        <div><i class="fa-solid fa-user"></i>
                          <a href="{{ route('journalist', $news->journalist->slug) }}">
                            {{ $news->journalist->name }}</a>
                        </div>
                      </div>
                      <div class="all_news_title">
                        <a href="{{ route('news_details', $news->slug) }}">
                          {{ Str::limit($news->title, 75, '...') }}
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
          @include('frontend.advertise.add1')
          <div class="gap-30"></div>
          @include('frontend.1st_block.featured_video')
          <div class="gap-30"></div>
        </div>
      </div>
    </div>
  </section>
@endsection
