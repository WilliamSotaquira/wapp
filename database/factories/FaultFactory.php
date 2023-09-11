<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faults>
 */
class FaultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'value' => $this->faker->numberBetween(0, 15000),
            'type' => $this->faker->boolean(1,3),
            'description' => $this->faker->sentence(),
            'plan_id' => Plan::all()->random()->id,
        ];
    }
}
