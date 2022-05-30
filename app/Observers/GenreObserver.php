<?php

namespace App\Observers;

use App\Models\Genre;
use Illuminate\Support\Facades\Auth;

class GenreObserver
{
    /**
     * Handle the Genre "creating" event.
     *
     * @param  \App\Models\Genre  $genre
     * @return void
     */
    public function creating(Genre $genre)
    {
        if (!$genre->uploader_id) {
            $genre->uploader_id = Auth::id();
        }
    }
}
