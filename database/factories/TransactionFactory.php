<?php

namespace Database\Factories;

use App\Models\Budget;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transactions>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'details' => $this->faker->sentence(),
            'payment' => $this->faker->numberBetween(0, 100000),
            'grand' => $this->faker->numberBetween(0, 100000),
            'status' => $this->faker->numberBetween(0, 1),
            'type' => $this->faker->numberBetween(0, 4),
            'transaction_date' => $this->faker->date('Y-m-d', 'now'),
            'payment_installments' => $this->faker->numberBetween(0, 12),
            'payment_number' => $this->faker->numberBetween(0, 12),
            'autorization_number' => $this->faker->numberBetween(0, 999999),
            'agreed_rate' => $this->faker->numberBetween(0, 100),
            'billed_EA' => $this->faker->numberBetween(0, 100),

            'category_id' => Category::all()->random()->id,
            'budget_id' => Budget::all()->random()->id,
            'users_id' => User::all()->random()->id,
        ];
    }
}
