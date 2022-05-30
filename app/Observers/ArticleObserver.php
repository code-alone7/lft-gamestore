<?php

namespace App\Observers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleObserver
{
    /**
     * Handle the Article "creating" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function creating(Article $article)
    {
        if (!$article->uploader_id) {
            $article->uploader_id = Auth::id();
        }
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        if (Storage::disk('public')->exists($article->getRawOriginal('photo'))) {
            Storage::disk('public')->delete($article->getRawOriginal('photo'));
        }
    }
}
