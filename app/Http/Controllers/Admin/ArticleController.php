<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Keyword;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::allowed()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function store(StoreArticleRequest $request)
    {
        $this->authorize('create', new Article);

        $article = Article::create($request->all());

        return redirect()->route('admin.articles.edit', $article);
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('admin.articles.edit', [
            'article' => $article,
            'categories' => Category::all(),
            'keywords' => Keyword::all(),
        ]);
    }

    public function update(Article $article, UpdateArticleRequest $request)
    {
        $this->authorize('update', $article);

        $article->update($request->all());
        $article->syncKeywords($request->get('keywords'));

        return redirect()
            ->route('admin.articles.edit', $article)
            ->with('flash', 'El articulo ha sido actualizado!');
    }

    public function destroy(Article $article)
    {

        $this->authorize('delete', $article);
        $article->delete();
        return redirect()
            ->route('admin.articles.index')
            ->with('flash', 'El articulo ha sido eliminado!');
    }
}
