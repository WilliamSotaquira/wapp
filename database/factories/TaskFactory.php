<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Sprint;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(45),
            'type' => $this->faker->word(45),
            'notes' => $this->faker->text,
            'predecessor' => $this->faker->numberBetween(0, 100),
            'project_id' => Project::all()->random()->id,
            'sprint_id' => Sprint::all()->random()->id,
        ];
    }
}
