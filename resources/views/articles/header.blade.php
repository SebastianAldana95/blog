<header class="container-flex space-between">
    <div class="date">
        <span class="c-gris">
            {{ optional($article->published_at)->format('M d') }} / {{ $article->user->name }}
        </span>
    </div>
    @if($article->category)
        <div class="post-category">
            <span class="category">
                <a href="{{ route('categories.show', $article->category) }}">{{ $article->category->name }}</a>
            </span>
        </div>
    @endif
</header>
