<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Elektronik',
                'Fashion',
                'Makanan & Minuman',
                'Kesehatan',
                'Otomotif',
                'Perabotan',
                'Olahraga',
                'Hobi',
                'Kecantikan',
                'Buku'
            ]),
        ];
    }
}