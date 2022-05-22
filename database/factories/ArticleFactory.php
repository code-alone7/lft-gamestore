<?php

namespace Database\Factories;

use App\Traits\FormattedTextGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
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
            'title' => $this->faker->unique()->text(rand(15, 30)),
            'content' => $this->formattedText(rand(3,6), rand(200, 600)),
            'photo' => $this->photo('articles/photos/', 250, 145),
        ];
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
