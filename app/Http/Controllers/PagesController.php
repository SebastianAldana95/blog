<?php

namespace App\Http\Controllers;

use App\Article;

class PagesController extends Controller
{
    public function home()
    {
        $articles = Article::published()->paginate(5);
        return view('pages.home', compact('articles'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function archive()
    {
        return view('pages.archive');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
