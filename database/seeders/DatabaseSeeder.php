<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Client::factory(10)->create();

        Order::factory()->hasAttached(
            Product::factory()->count(2),
            ["OrderQuantity" => fake()->randomNumber()]
        )
            ->count(10)->create();
    }
}
