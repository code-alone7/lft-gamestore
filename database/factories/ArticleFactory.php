<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->text(rand(15, 30)),
            'content' => $this->formattedText(rand(3,6), rand(200, 600)),
            'photo' => $this->photo('articles/photos/', 250, 145),
        ];
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
