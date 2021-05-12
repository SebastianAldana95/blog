
@extends('layout')

@section('content')

    <section class="posts container">
        @if(isset($title))
            <h3 style="text-align: center">{{ $title }}</h3>
        @endif
        @foreach($articles  as $article)
            <article class="post">
                @if ( $article->resources->count() === 1)
                    <figure>
                        <img style="width: 100%" src="{{ url(asset('storage/'.$article->resources->first()->url)) }}" alt="" class="img-responsive">
                    </figure>
                @elseif($article->resources->count() > 1)
                    <div class="gallery-photos" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 464 }'>
                        @foreach($article->resources->take(4) as $resource)
                            <figure class="grid-item grid-item--height2">
                                @if($loop->iteration === 4)
                                    <div class="overlay">{{ $article->resources->count() }} Fotos</div>
                                @endif
                                <img style="width: 100%" src="{{ url(asset('storage/'.$resource->url)) }}" alt="" class="img-responsive">
                            </figure>
                        @endforeach
                    </div>
                @elseif($article->iframe)
                    <div class="video">
                        {!! $article->iframe !!}
                    </div>
                @endif

                <div class="content-post">
                    <header class="container-flex space-between">
                        <div class="date">
                            <span class="c-gray-1">{{ $article->published_at ? $article->published_at->format('m/d/y') : null }}</span>
                        </div>
                        <div class="post-category">
                            <span class="category text-capitalize">
                                <a href="{{ route('categories.show', $article->category) }}">{{ $article->category->name  }}</a>
                            </span>
                        </div>
                    </header>
                    <h1>{{ $article->title }}</h1>
                    <div class="divider"></div>
                    <p>{{ $article->excerpt }}</p>
                    <footer class="container-flex space-between">
                        <div class="read-more">
                            <a href="blog/{{ $article->url }}" class="text-uppercase c-green">Leer más</a>
                        </div>
                        <div class="tags container-flex">
                            @foreach($article->keywords as $keyword)
                            <span class="tag c-gray-1 text-capitalize">
                                <a href="{{ route('keywords.show', $keyword) }}">#{{ $keyword->name }}</a>
                            </span>
                            @endforeach
                        </div>
                    </footer>
                </div>
            </article>
        @endforeach
    </section><!-- fin del div.posts.container -->

    {{ $articles->links() }}

@stop

