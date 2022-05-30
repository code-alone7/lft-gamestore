<?php

namespace App\Observers;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GameObserver
{
    /**
     * Handle the Game "creating" event.
     *
     * @param  \App\Models\Game  $game
     * @return void
     */
    public function creating(Game $game)
    {
        if (!$game->uploader_id) {
            $game->uploader_id = Auth::id();
        }
    }

    /**
     * Handle the Game "deleted" event.
     *
     * @param  \App\Models\Game  $game
     * @return void
     */
    public function deleted(Game $game)
    {
        if (Storage::disk('public')->exists($game->photo)) {
            Storage::delete($game->photo);
        }
    }
}
