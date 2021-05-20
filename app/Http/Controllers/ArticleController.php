<?php

namespace App\Http\Controllers;

use App\Article;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        if ($article->isPublished() || auth()->check())
        {
            return view('articles.show', compact('article'));
        }
        abort(404);
    }
}
