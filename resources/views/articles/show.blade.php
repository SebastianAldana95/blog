@extends('layout')

@section('meta-title', $article->title)
@section('meta-description', $article->excerpt)

@section('content')
    <article class="post container" style="padding: 0">

        @include( $article->viewType() )

        <div class="content-post">
            @include('articles.header')
            <h1>{{ $article->title }}</h1>
            <div class="divider"></div>
            <div class="image-w-text">
                {!! $article->content !!}
            </div>

            <footer class="container-flex space-between">
                @include('partials.social-links', ['description' => $article->title])
                @include('articles.keywords')
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
    <link rel="stylesheet" href="/css/twitter-bootstrap.css"/>
@endpush


@push('scripts')
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/twitter-bootstrap.js"></script>
@endpush
