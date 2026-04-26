<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Ayo Belajar',
            'email' => 'belajar@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Buat 5 kategori
        $categories = Category::factory(5)->create();

        // Buat 20 produk untuk user tersebut dengan kategori acak
        Product::factory(20)->create([
            'user_id' => $user->id,
            'category_id' => $categories->random()->id,
        ]);
    }
}
