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
