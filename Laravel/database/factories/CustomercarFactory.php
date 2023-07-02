<?php

namespace Database\Factories;
use App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customercar>
 */
class CustomercarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customerCount = Customer::count();
        $customerId = ($customerCount > 0) ? fake()->unique()->numberBetween(1, $customerCount) : null;

        return [
            'brand' => fake()->name(),
            'model' => fake()->name(),
            'number_plate' => fake()->unique()->numerify("#####"),
            'customer_id' => $customerId,
        ];
    }
}
