<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('genres')) {
            View::share('sidebarGenres', Genre::query()->latest()->get());
        }
        if (Schema::hasTable('articles')) {
            View::share('sidebarArticles', Article::query()->latest()->take(3)->get());
        }
        if (Schema::hasTable('games')) {
            View::share('randomProduct', Game::query()->inRandomOrder()->first());
        }
    }
}
