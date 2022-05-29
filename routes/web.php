<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeController as Jp;
use App\Http\Controllers\OrderController;
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
    Route::get('/{game}', [GameController::class, 'show'])->name('games.show');
});

Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('articles');
    Route::get('/{article}', [ArticleController::class, 'show'])->name('articles.show');
});

Route::get('/cart', [OrderController::class, 'cart'])->name('cart');
Route::prefix('order')->group(function() {
    Route::post('/add/{game}', [OrderController::class, 'addGame'])->name('order.add-game');
    Route::post('/remove/{game}', [OrderController::class, 'removeGame'])->name('order.remove-game');
    Route::post('/process', [OrderController::class, 'processOrder'])->name('order.process');

    Route::get('/list', [OrderController::class, 'list'])->name('order.list');
    Route::get('/{order}', [OrderController::class, 'show'])->name('order.show');
});

require __DIR__ . '/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
