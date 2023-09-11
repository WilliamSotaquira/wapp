<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Images>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tag = $this->faker->sentence(4);

        return [
            'alt' => $tag,
            'url' => $this->faker->imageUrl(640, 480),
            'title' => $this->faker->sentence(),
            'tag' => Str::slug($tag, '_'),
        ];
    }
}
