<div class="widget post-widget">
    <div class="title-section">
        <h1><span>Featured Videos</span></h1>
    </div>
    
    <div class="image-post-slider">
        <ul class="bxslider">
            
            @foreach ($videoGallery as $video)
            <li>
                <div class="news-post image-post2">
                    <div class="post-gallery">
                        <img src="{{ $video->photo }}" alt="">                        
                        <div class="hover-box">
                            <div class="inner-hover">
                                <ul class="post-tags">
                                    <a href="{{ $video->video }}" class="video-link">
                                        <i class="fa-solid fa-play video_play_btn"></i>
                                    </a>                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
            
        </ul>
    </div>
    <div class="center-button">
        <a href="{{ route('all_video_gallery') }}"> More featured Videos</a>
    </div>
</div>
