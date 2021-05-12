<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($article->resources as $resource)
            <li data-target="#carouselExampleIndicators"
                data-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}">
            </li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($article->resources as $resource)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ url(asset('storage/'.$resource->url)) }}" alt="First slide">
            </div>
        @endforeach
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


