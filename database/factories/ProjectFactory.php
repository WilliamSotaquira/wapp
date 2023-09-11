<?php

namespace Database\Factories;

use App\Models\Budget;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->text,
            'priority' => $this->faker->numberBetween(0, 5),
            'end_at' => $this->faker->dateTime,
            'user_id'=> User::all()->random()->id,
            'budget_id'=> Budget::all()->random()->id,
        ];
    }
}
