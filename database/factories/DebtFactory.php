<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Debt>
 */
class DebtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'product' => $this->faker->userName(),
            'quantity' => $this->faker->buildingNumber(),
            'deadline' => $this->faker->date(),
            'messageStatus' => "0",
        ];
    }
}
