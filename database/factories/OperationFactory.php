<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operations>
 */
class OperationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'qty'=> $this->faker->numberBetween(1, 10),
            'subtotal' => $this->faker->numberBetween(15000, 150000),
            'tax_subtotal' => $this->faker->numberBetween(15000, 150000),
            'description' => $this->faker->sentence(),
            'item_id' => Item::all()->random()->id,
            'transaction_id' => Transaction::all()->random()->id,

        ];
    }
}
