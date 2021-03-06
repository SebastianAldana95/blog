<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * App\Article
 * @method static Builder|Article published()
 */
class Article extends Model
{
    protected $fillable = [
        'published_at',
        'url',
        'title',
        'excerpt',
        'content',
        'state',
        'type',
        'visibility',
        'total_score',
        'iframe',
        'article_id',
        'category_id',
        'user_id'
    ];

    protected $dates = [
        'published_at'
    ];

    // Method for delete relationships (cascade)
    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        //
        static::deleting(function ($article) {
            $article->keywords()->detach();
            // $article->keywords()->detach(); ahora realizado desde el modelo.
            /* Para accionar el evento deleting en el modelo Resources
             * $article->resources->each(function($resource){
             *      $resource->delete();
             * });
             * */
            $article->resources->each->delete();
        });
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    // Mutators
    /*public function setTitleAttribute($title)
    {
        $this->attributes['title'] =  $title;

        $originalUrl = $url = Str::slug($title);
        $count = 1;
        while (Article::query()->where('url', $url)->exists()) {
            $url = "{$originalUrl}-" . ++$count;
        }

        $this->attributes['url'] = $url;
    }*/

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category)
            ? $category
            : Category::create(['name' => $category])->id;
    }

    // Met??do para agregar relaci??n desde el modelo
    public function syncKeywords($keywords)
    {
        $keywordIds = collect($keywords)->map(function ($keyword) {
            return Keyword::find($keyword) ? $keyword : Keyword::create(['name' => $keyword])->id;
        });

        return $this->keywords()->sync($keywordIds);
    }

    // query scope
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
            ->where('visibility', '=', 1)
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at');
    }

    public function scopeAllowed($query)
    {
        // si puede ver (view) en la politica de acceso
        if (auth()->user()->can('view', $this))
        {
            return $query;
        }

        return $query->where('user_id', auth()->id());
    }

    //es p??blico -> no requiere autenticaci??n
    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at < today();
    }

    //tipo de vista polimorfica
    public function viewType($home = '')
    {
        if ( $this->resources->count() === 1):
            return 'articles.photo';
        elseif($this->resources->count() > 1):
            return $home === 'home' ? 'articles.carousel-preview' : 'articles.carousel';
        elseif($this->iframe):
            return 'articles.iframe';
        else:
            return 'articles.text';
        endif;
    }

    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->id();

        $article = static::query()->create($attributes);

        $article->generateUrl();

        return $article;
    }

    public function generateUrl()
    {
        $url = Str::slug($this->title);

        if ($this->whereUrl($url)->exists())
        {
            $url = "{$url}-{$this->id}";
        }

        $this->url = $url;

        $this->save();
    }

    // relationships

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function childrenArticles(): HasMany
    {
        return $this->hasMany(Article::class)->with('articles');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function keywords(): BelongsToMany
    {
        return $this->belongsToMany(Keyword::class);
    }

    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
