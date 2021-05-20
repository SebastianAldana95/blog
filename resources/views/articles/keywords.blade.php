<div class="tags container-flex">
    @foreach($article->keywords as $keyword)
        <span class="tag c-gray-1 text-capitalize">
            <a href="{{ route('keywords.show', $keyword) }}">#{{ $keyword->name }}</a>
        </span>
    @endforeach
</div>
