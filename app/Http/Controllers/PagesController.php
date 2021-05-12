<?php

namespace App\Http\Controllers;

use App\Article;

class PagesController extends Controller
{
    public function home()
    {
        $articles = Article::published()->paginate(5);
        return view('welcome', compact('articles'));
    }
}
