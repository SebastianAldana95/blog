<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResourceController extends Controller
{
    public function store(Article $article, Request $request)
    {
        $this->validate($request, [
            'url' => 'required|file'
        ]);

        $article->resources()->create([
            'details' => $request->file('url')->getClientMimeType(),
            'url' => $request->file('url')->store('articles', 'public'),
        ]);

        return back()->with('flash', 'Recursos agregados correctamente!');

    }

    public function destroy(Resource $resource)
    {
        $resource->delete();
        return back()->with('flash', 'Recurso eliminado correctamente!');
    }
}
