<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applications>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'is_active' => $this->faker->boolean,
            'amount' => $this->faker->numberBetween(0, 350000),
            'priority' => $this->faker->numberBetween(0, 4)
        ];
    }
}
