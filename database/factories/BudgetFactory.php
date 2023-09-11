<?php

namespace Database\Factories;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Budget>
 */
class BudgetFactory extends Factory
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
            'purpose' => $this->faker->sentence(rand(10, 25)),
            'value' => $this->faker->numberBetween(1, 100),
            'wallet_id' => Wallet::all()->random()->id,
        ];
    }
}



