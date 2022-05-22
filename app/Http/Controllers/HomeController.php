<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|Factory|View
     */
    public function __invoke(Request $request): View|Factory|Application
    {
        return view('home', [
            'games' => Game::query()->latest()->paginate(6),
        ]);
    }
}
