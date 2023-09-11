<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Credits>
 */
class CreditFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $capital = $this->faker->numberBetween(0, 700000);
        $interest = 17;
        $installments = $this->faker->numberBetween(1, 11);
        $installment_value = $capital / $installments;

        return [
            'amount' => $capital,
            'interest' => $interest,
            'installments' => $installments,
            'installment_value' => $installment_value,
            'paid' => $capital,
            'capital' => $capital,
            'payment' => $this->faker->numberBetween(0, 4),

            'plan_id' => Plan::all()->random()->id,
            'application_id' => Application::all()->random()->id,

            'disbursement_at' => now(),
        ];
    }
}
