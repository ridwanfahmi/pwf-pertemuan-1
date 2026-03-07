<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => $this->faker->randomElement([
                'Elektronik',
                'Fashion',
                'Makanan & Minuman',
                'Kesehatan',
                'Otomotif',
                'Perabotan',
                'Olahraga'
            ]),
            'product_id' => Product::all()->random()->id,
            
        ];
    }
}