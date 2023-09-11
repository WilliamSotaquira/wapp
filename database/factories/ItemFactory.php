<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Items>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(2),
            'tax' => $this->faker->numberBetween(0, 100),
            'price' => $this->faker->numberBetween(0, 100000),
            'previous_price' => $this->faker->numberBetween(0, 100000),
            'measure' => $this->faker->word(1),
            'by_fraction' => $this->faker->numberBetween(0, 100),
            'efficiency' => $this->faker->numberBetween(0, 100),
            'maslow_value' => $this->faker->numberBetween(0, 100),
        ];
    }
}
