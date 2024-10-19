{{-- users/news/news_list.blade.php --}}
@foreach ($news as $item)
    <div class="news-block-two">
        <div class="inner-box">
            <div class="image">
                @if ($item->image)
                    <a href="{{ route('news.chi', $item->alias) }}"><img src="{{ asset($item->image) }}" alt="" /></a>
                @else
                    <a href="{{ route('news.chi', $item->alias) }}"><img src="{{ asset('/source/images/resource/news-4.jpg') }}" alt="" /></a>
                @endif
            </div>

            <h4><a href="{{ route('news.chi', $item->alias) }}" class="text-limit-2-line">{{ $item->title }}</a></h4>
            <p class="text-limit-2-line">{{ $item->description }}</p>
            <div class="post-date">
                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F, Y') }} by <span>Admin</span>
            </div>
        </div>
    </div>
@endforeach

<!-- Pagination -->
<div class="nac_pri d-flex" style="justify-content: center">
    {{ $news->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
