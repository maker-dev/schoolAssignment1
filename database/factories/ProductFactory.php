<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "CodePro" => fake()->unique()->regexify("[A-Z0-9]{8}"),
            "NomPro"  => fake()->word(),
            "Color"   => fake()->colorName(),
            "BuyPrice" => fake()->randomFloat(2, 1000, 5000),
            "SellPrice" => fake()->randomFloat(2, 5000, 6000),
            "QuantityStk" => fake()->randomDigit() + 1
        ];
    }
}
