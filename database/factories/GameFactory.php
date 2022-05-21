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
        return [
            'title' => $this->faker->unique()->text(rand(10,30)),
            'price' => rand(1, 30) * 100,
            'description' => $this->formattedText(rand(2, 5), rand(200, 600)),
            'photo' => 'https://picsum.photos/250/145',
        ];
    }

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

    /**
     * Randomly generate paragraphs wrapped in <p> tag.
     *
     * @param int $pNum amount of paragraphs.
     * @param int $pLength length of paragraphs.
     * @return string
     */
    private function formattedText(int $pNum, int $pLength): string
    {
        $text = '';

        for ($i = 0; $i < $pNum; $i++) {
            $text .= '<p>';
            $text .= $this->faker->realText($pLength);
            $text .= '</p>';
        }

        return $text;
    }
}
