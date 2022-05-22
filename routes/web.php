<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeController as Jp;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::prefix('games')->group(function () {
    Route::get('/', [GameController::class, 'index'])->name('games');
    Route::get('/show/{game}', [GameController::class, 'show'])->name('games.show');
});

Route::prefix('articles')->group(function() {
    Route::get('/', [ArticleController::class, 'index'])->name('articles');
    Route::get('/show/{article}', [ArticleController::class, 'show'])->name('articles.show');
});

require __DIR__.'/auth.php';
