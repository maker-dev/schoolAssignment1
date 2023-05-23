<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'CodeCli' => fake()->unique()->regexify('[A-Z0-9]{8}'),
            'NomCli' => fake()->name(),
            'CatCli' => fake()->word(),
            'VilCli' => fake()->city()
        ];
    }
}
