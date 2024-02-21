<!-- article box -->
<div class="article-box">
    <div class="title-section">
        <h1><span>Latest Articles</span></h1>
    </div>


    @foreach ($articles as $article)
        <div class="news-post article-post">
            <div class="row">
                <div class="col-sm-4">
                    <div class="post-gallery">
                        <img src="{{ $article->photo }}" alt="{{ $article->alter_text }}">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="post-content">
                        <h2><a href="{{ route('blog_details', $article->slug) }}">{{ $article->title }}</a></h2>
                        <ul class="post-tags">
                            <li><i class="fa-solid fa-calendar-days"></i>
                                {{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}
                            </li>
                            <li><i class="fa-solid fa-user"></i> by <a href="#"> {{ $article->auther }}</a></li>
                        </ul>
                        <p>{!! Str::limit($article->description, 120, '...') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="center-button">
        <a href="{{ route('all_article') }}"> View All</a>
    </div>

</div>
<!-- End article box -->
