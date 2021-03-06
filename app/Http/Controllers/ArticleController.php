<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Game;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::query()
                ->latest()
                ->paginate(4)
                ->withQueryString(),
        ]);
    }

    /**
     * Display the specified article.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article,
            'games' => Game::query()->inRandomOrder()->take(3)->get(),
        ]);
    }
}
