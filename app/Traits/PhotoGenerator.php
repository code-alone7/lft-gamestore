<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait PhotoGenerator {
    function photo(string $path, int $width, int $height): string
    {
        $downloadPath = $path . uniqid() . '.jpg';
        Storage::disk('public')->put(
            $downloadPath,
            file_get_contents("https://picsum.photos/$width/$height")
        );
        return $downloadPath;
    }
}