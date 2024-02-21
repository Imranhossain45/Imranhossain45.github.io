<div class="search_tag">News</div>
@foreach ($table2Query as $item)
    @if (isset($item->title))
        <a href="{{ route('news_details', $item->slug) }}">
          <img src="{{ $item->photo }}" alt="">
            <li>
              
              {{ $item->title }}</li>
        </a>
    @endif
@endforeach
<div class="search_tag">Article</div>
@foreach ($table1Query as $item)
    @if (isset($item->title))
        <a href="{{ route('blog_details', $item->slug) }}">
            <img src="{{ $item->photo }}" alt="">
            <li>{{ $item->title }}</li>
        </a>
    @endif
@endforeach

{{-- <div class="search_tag">Documents</div>
@foreach ($table3Query as $item)
    @if (isset($item->name))
        <a href="{{ route('documents') }}">
            <li>{{ $item->name }}</li>
        </a>
    @endif
@endforeach --}}