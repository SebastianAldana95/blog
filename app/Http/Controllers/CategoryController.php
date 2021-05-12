<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view('welcome', [
            'title' => "Artículos de la categoría '{$category->name}'",
            'articles' => $category->articles()->published()->paginate(),
        ]);
    }
}
