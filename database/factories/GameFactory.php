<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Genre;
use App\Traits\FormattedTextGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    use FormattedTextGenerator;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->text(rand(10,30)),
            'price' => rand(1, 30) * 100,
            'description' => $this->formattedText(rand(2, 5), rand(200, 600)),
            'photo' => $this->photo('games/photos/', 250, 145),
        ];
    }
    //'https://picsum.photos/250/145'

    public function configure(): GameFactory
    {
        return $this->afterCreating(function (Game $game) {
            $gCount = Genre::query()->count();

            if ($gCount) {
                // Attach one to three random genres to the game.
                $genresID = Genre::query()
                    ->inRandomOrder()
                    ->take(rand(1, min(3, $gCount))) // min() in case genres count < 3.
                    ->pluck('id');

                $game->genres()->attach($genresID);
            }
        });
    }

    private function photo(string $path, int $width, int $height): string
    {
        $downloadPath = $path . uniqid() . '.jpg';
        Storage::disk('public')->put(
            $downloadPath,
            file_get_contents("https://picsum.photos/$width/$height")
        );
        return $downloadPath;
    }
}
