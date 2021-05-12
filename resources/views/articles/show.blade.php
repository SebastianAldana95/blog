@extends('layout')

@section('meta-title', $article->title)
@section('meta-description', $article->excerpt)

@section('content')
    <article class="post container" style="padding: 0">
        @if ( $article->resources->count() === 1)
            <figure>
                <img style="width: 100%" src="{{ url(asset('storage/'.$article->resources->first()->url)) }}" alt="" class="img-responsive">
            </figure>
        @elseif($article->resources->count() > 1)
            @include('articles.carousel')
        @elseif($article->iframe)
            <div class="video">
                {!! $article->iframe !!}
            </div>
        @endif
        <div class="content-post">
            <header class="container-flex space-between">
                <div class="date">
                    <span class="c-gris">{{ $article->published_at ? $article->published_at->format('m/d/y') : null }}</span>
                </div>
                <div class="post-category">
                    <span class="category">{{ $article->category->name }}</span>
                </div>
            </header>
            <h1>{{ $article->title }}</h1>
            <div class="divider"></div>
            <div class="image-w-text">
                {!! $article->content !!}
            </div>

            <footer class="container-flex space-between">
                @include('partials.social-links', ['description' => $article->title])
                <div class="tags container-flex">
                    @foreach($article->keywords as $keyword)
                        <span class="tag c-gray-1 text-capitalize">#{{ $keyword->name }}</span>
                    @endforeach
                </div>
            </footer>
            <div class="comments">
                <div class="divider"></div>
                <div id="disqus_thread"></div>
                @include('partials.disqus-script')
            </div><!-- .comments -->
        </div>
    </article>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endpush

@push('scripts')
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush
