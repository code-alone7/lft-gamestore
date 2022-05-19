<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $desc = '';

        for ($i = 0; $i < rand(2, 5); $i++) {
            $desc .= '<p>';
            $desc .= $this->faker->realText(rand(200, 600));
            $desc .= '</p>';
        }

        return [
            'title' => $this->faker->unique()->text(rand(10,30)),
            'price' => rand(1, 30) * 100,
            'description' => $desc,
            'photo' => 'https://picsum.photos/250/145',
        ];
    }

    public function configure(): GameFactory
    {
        return $this->afterCreating(function (Game $game) {
            $gCount = Genre::query()->count();

            if ($gCount) {
                $genresID = Genre::query()
                    ->inRandomOrder()
                    ->take(rand(1, min(3, $gCount)))
                    ->pluck('id');

                $game->genres()->attach($genresID);
            }
        });
    }
}
