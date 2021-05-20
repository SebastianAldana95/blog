<figure>
    <img style="width: 100%"
         src="{{ url(asset('storage/'.$article->resources->first()->url)) }}"
         alt="Foto: {{ $article->title }}"
         class="img-responsive">
</figure>
