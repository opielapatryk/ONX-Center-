<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
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
            'name' => fake()->name(),
            'customer_id' => $customerId
        ];
    }
}
