<?php

namespace App\Http\Controllers;

use App\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function show(Keyword $keyword)
    {
        return view('welcome', [
            'title' => "Artículos de la etiqueta '{$keyword->name}'",
            'articles' => $keyword->articles()->published()->paginate(),
        ]);
    }
}
