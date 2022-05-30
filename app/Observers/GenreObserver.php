<?php

namespace App\Observers;

use App\Models\Genre;
use Illuminate\Support\Facades\Auth;

class GenreObserver
{
    /**
     * Handle the Genre "created" event.
     *
     * @param  \App\Models\Genre  $genre
     * @return void
     */
    public function created(Genre $genre)
    {
        if (!$genre->uploader_id) {
            $genre->uploader_id = Auth::id();
        }
    }
}
