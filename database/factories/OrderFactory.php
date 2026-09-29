<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->unique()->regexify('[A-Z0-9]{20}'),
            'customer_id' => Customer::factory(),
            'total' => fake()->randomFloat(2, 0, 10000),
            'status' => fake()->randomElement([
                'draft',
                'confirmed',
                'cancelled'
            ]),
        ];
    }
}