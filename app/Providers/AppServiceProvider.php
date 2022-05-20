<?php

namespace App\Providers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('sidebarGenres', Genre::query()->latest()->get());
        View::share('randomProduct', Game::query()->inRandomOrder()->first());
    }
}
