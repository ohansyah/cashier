<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
        $categoryIds = Category::pluck('id')->toArray();

        return [
            'name' => ucfirst($this->faker->word()) . ' ' . ucfirst($this->faker->word()),
            'sku' => $this->faker->unique()->randomNumber(8),
            'barcode' => $this->faker->unique()->randomNumber(8),
            'description' => $this->faker->text,
            'price' => $this->faker->randomNumber(2) * 100,
            'stock' => $this->faker->randomNumber(2),
            'image' => $this->faker->imageUrl(),
            'is_active' => $this->faker->boolean,
            'category_id' => $this->faker->randomElement($categoryIds),
        ];
    }
}
