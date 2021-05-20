<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view('pages.home', [
            'title' => "Artículos de la categoría '{$category->name}'",
            'articles' => $category->articles()->published()->paginate(),
        ]);
    }
}
