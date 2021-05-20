
@extends('layout')

@section('content')

    <section class="posts container">
        @if(isset($title))
            <h3 style="text-align: center">{{ $title }}</h3>
        @endif

        @foreach($articles  as $article)
            <article class="post">

                @include( $article->viewType('home') )

                <div class="content-post">
                    @include('articles.header')
                    <h1>{{ $article->title }}</h1>
                    <div class="divider"></div>
                    <p>{{ $article->excerpt }}</p>

                    <footer class="container-flex space-between">
                        <div class="read-more">
                            <a href="{{ route('articles.show', $article) }}" class="text-uppercase c-green">Leer más</a>
                        </div>
                        @include('articles.keywords')
                    </footer>
                </div>
            </article>
        @endforeach
    </section><!-- fin del div.posts.container -->

    {{ $articles->links() }}

@stop

