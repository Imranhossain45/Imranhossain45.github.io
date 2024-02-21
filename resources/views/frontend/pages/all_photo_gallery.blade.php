@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="pad_top_50 pad_bot_res_60">
        <div class="container">
            <div class="row">
                @foreach ($photoGallery as $photo)
                    <div class="col-lg-3 photo_gallery_margin_bottom">
                        <div class="post-overaly-style text-center clearfix block">
                            <a href="{{route('photo_gallery',$photo->slug)}}">
                                <div class="post-thumb">
            
                                    <img class="img-fluid" src="{{ $photo->thumb_photo }}" alt="{{ $photo->thumb_alt_text }}" />
                                </div><!-- Post thumb end -->
            
                                
            
                                <div class="post-content all_videos_post_content">
                                    <h2 class="post-title">
                                        <a href="{{route('photo_gallery',$photo->slug)}}">{{ $photo->title }}</a>
                                    </h2>
            
                                </div><!-- Post content end -->
                            </a>
            
                        </div><!-- Post Overaly Article 1 end -->
                    </div>
                @endforeach
            </div>
            <div class="pagination_links">
                {{ $photoGallery->links() }}
            </div>
        </div>
    </section>
@endsection
