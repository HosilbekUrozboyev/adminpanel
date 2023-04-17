<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phoneNumber' => $this->faker->unique()->phoneNumber(),
            'adress' => $this->faker->address(),
            'debtStatus' => $this->faker->word(),
//            'remember_token' => Str::random(15),
        ];
    }
}
