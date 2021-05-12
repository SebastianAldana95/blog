<?php

use App\Article;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();
        Category::truncate();

        $category = new Category;
        $category->name = "Policia";
        $category->save();

        $category = new Category;
        $category->name = "Educacion";
        $category->save();

        $category = new Category;
        $category->name = "Criminalistica";
        $category->save();

        $article = new Article;
        $article->url = Str::slug("Mi primer articulo");
        $article->title = "Mi primer articulo";
        $article->excerpt = "Extracto de mi primer articulo";
        $article->content = "<p>Contenido de mi primer articulo</p>";
        $article->published_at = Carbon::now()->subDays(4);
        $article->state = "privado";
        $article->visibility = 1;
        $article->category_id = 1;
        $article->save();

        $article = new Article;
        $article->url = Str::slug("Mi segundo articulo");
        $article->title = "Mi segundo articulo";
        $article->excerpt = "Extracto de mi segundo articulo";
        $article->content = "<p>Contenido de mi segundo articulo</p>";
        $article->published_at = Carbon::now()->subDays(3);
        $article->state = "privado";
        $article->visibility = 1;
        $article->category_id = 2;
        $article->save();

        $article = new Article;
        $article->url = Str::slug("Mi tercer articulo");
        $article->title = "Mi tercer articulo";
        $article->excerpt = "Extracto de mi tercer articulo";
        $article->content = "<p>Contenido de mi tercer articulo</p>";
        $article->published_at = Carbon::now()->subDays(2);
        $article->state = "privado";
        $article->visibility = 1;
        $article->category_id = 3;
        $article->save();

        $article = new Article;
        $article->url = Str::slug("Mi cuarto articulo");
        $article->title = "Mi cuarto articulo";
        $article->excerpt = "Extracto de mi cuarto articulo";
        $article->content = "<p>Contenido de mi cuarto articulo</p>";
        $article->published_at = Carbon::now()->subDays(1);
        $article->state = "publico";
        $article->visibility = 1;
        $article->category_id = 1;
        $article->save();

    }
}
