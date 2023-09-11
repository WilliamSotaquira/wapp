<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contributions>
 */
class ContributionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(15000, 150000),
            'payment' => $this->faker->numberBetween(0, 4),
            'description' => $this->faker->sentence(),
            'plan_id' => Plan::all()->random()->id,
            'date_at' => now()
        ];
    }
}
