<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subtask>
 */
class SubtaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'activity' => $this->faker->word(45),
            'description' => $this->faker->text,
            'duration' => $this->faker->numberBetween(0, 100),
            'priority' => $this->faker->numberBetween(0, 10),
            'status' => $this->faker->word(45),
            'progress' => $this->faker->numberBetween(0, 100),
            'start_at' => $this->faker->date,
            'start_time' => $this->faker->time,
            'end_at' => $this->faker->date,
            'end_time' => $this->faker->time,
            'task_id' => Task::all()->random()->id,

        ];
    }
}
