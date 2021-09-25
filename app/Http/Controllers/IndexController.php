<?php

namespace App\Http\Controllers;

use App\Models\Article;

class IndexController extends Controller
{
    private $limit_rows;

    public function __construct()
    {
        $this->limit_rows = config('app.limit_rows');
    }

    public function renderMain()
    {
        $articles = Article::lifo()->limit(6)->get();
        return view('index', compact('articles'));
    }

    public function renderCatalog()
    {
        $articles = Article::lifo()->paginate($this->limit_rows);
        return view('catalog', compact('articles'));
    }

    public function renderArticle(int $article_id)
    {
        $article = Article::find($article_id);
        if ($article === null) {
            abort(404);
        }

        return view('article', compact('article'));
    }
}
