<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(3),
            'description'=> $this -> faker->sentence(rand(15, 25)),
            'value'=> $this -> faker->numberBetween(15000, 1000000),
            'user_id' => User::all()->random()->id,
        ];
    }
}
