<?php

namespace Database\Factories;

use App\Traits\FormattedTextGenerator;
use App\Traits\PhotoGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    use FormattedTextGenerator, PhotoGenerator;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'header' => $this->faker->text(rand(40, 130)),
            'short_header' => $this->faker->text(rand(15, 30)),
            'content' => $this->formattedText(rand(3,6), rand(200, 600)),
            'photo' => $this->photo('articles/photos/', 250, 145),
        ];
    }
}
