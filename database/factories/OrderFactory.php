<?php

namespace Database\Factories;

use App\Models\Client;
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
        return [
            "NumOrd" => fake()->unique()->regexify("[A-Z0-9]{8}"),
            "DateOrd" => fake()->date(),
            "client_code" => Client::inRandomOrder()->first()
        ];
    }
}
