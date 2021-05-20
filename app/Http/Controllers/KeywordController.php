<?php

namespace App\Http\Controllers;

use App\Keyword;

class KeywordController extends Controller
{
    public function show(Keyword $keyword)
    {
        return view('pages.home', [
            'title' => "Artículos de la etiqueta '{$keyword->name}'",
            'articles' => $keyword->articles()->published()->paginate(),
        ]);
    }
}
