<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customerCount = Customer::count();
        $customerId = ($customerCount > 0) ? fake()->numberBetween(1, $customerCount) : null;

        return [
            'number' => fake()->unique()->numberBetween(1,200),
            'value' => fake()->numberBetween(1,10000),
            'customer_id' => $customerId,
        ];
    }
}
