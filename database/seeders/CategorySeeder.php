<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createdAt = now();
        Category::insert([
            [
                'name' => 'Makanan',
                'created_at' => $createdAt,
                'image' => 'https://source.unsplash.com/200x200/?food',
            ],
            [
                'name' => 'Minumam',
                'created_at' => $createdAt,
                'image' => 'https://source.unsplash.com/200x200/?food',
            ],
            [
                'name' => 'Alat Tulis',
                'created_at' => $createdAt,
                'image' => 'https://source.unsplash.com/200x200/?food',
            ],
            [
                'name' => 'Pakaian',
                'created_at' => $createdAt,
                'image' => 'https://source.unsplash.com/200x200/?food',
            ],
            [
                'name' => 'Mainan',
                'created_at' => $createdAt,
                'image' => 'https://source.unsplash.com/200x200/?food',
            ],
            [
                'name' => 'Furniture',
                'created_at' => $createdAt,
                'image' => 'https://source.unsplash.com/200x200/?food',
            ],
            [
                'name' => 'Bumbu Dapur',
                'created_at' => $createdAt,
                'image' => 'https://source.unsplash.com/200x200/?food',
            ],
            [
                'name' => 'Lainnya',
                'created_at' => $createdAt,
                'image' => 'https://source.unsplash.com/200x200/?food',
            ],
        ]);
    }
}
