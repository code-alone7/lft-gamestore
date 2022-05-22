<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $genre = Genre::query()->find($request->input('genre-id'));

        if (!$genre) {
            redirect()->route('home'); // just in case
        }

        return view('games.index', [
            'games' => Game::query()
                ->whereRelation('genres', 'genres.id', $genre->id)
                ->latest()
                ->paginate(12)->withQueryString(),
            'genre' => $genre,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return Application|Factory|View
     */
    public function show(Game $game): View|Factory|Application
    {
        $recommendations = Game::query();

        foreach ($game->genres as $genre) {
            $recommendations->whereRelation('genres', 'genres.id', $genre->id);
        }

        return view('games.show', [
            'game' => $game,
            'recommendations' => $recommendations->take(3)->get(),
        ]);
    }
}
