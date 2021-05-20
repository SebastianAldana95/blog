<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($article->resources as $resource)
            <li data-target="#carouselExampleIndicators"
                data-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}">
            </li>
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach($article->resources as $resource)
            <div class="item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ url(asset('storage/'.$resource->url)) }}" alt="First slide">
            </div>
        @endforeach
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
    <a class="right carousel-control" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
</div>




