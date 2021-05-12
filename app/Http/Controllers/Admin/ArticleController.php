<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Keyword;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $keywords = Keyword::all();
        return view('admin.articles.create', compact('categories', 'keywords'));
    }

    public function store(StoreArticleRequest $request)
    {
        $article = new Article;
        $article->fill($request->all());
        $article->save();

        $article->syncKeywords($request->get('keywords'));

        return back()
            ->with('flash', 'El articulo ha sido creado');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $keywords = Keyword::all();
        return view('admin.articles.edit', compact('categories', 'keywords', 'article'));
    }

    public function update(Article $article, UpdateArticleRequest $request)
    {

        $article->update($request->all());
        $article->syncKeywords($request->get('keywords'));

        return redirect()
            ->route('admin.articles.edit', $article)
            ->with('flash', 'El articulo ha sido actualizado!');
    }

    public function destroy(Article $article)
    {

        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('flash', 'El articulo ha sido eliminado!');
    }
}
