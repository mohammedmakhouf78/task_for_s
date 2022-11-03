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
    public function definition()
    {
        $categories = ['men', 'women', 'kids', 'adults', 'normal'];
        $brands = ['toyota', 'mercedis', 'BMW', 'Lancer', 'Hundai'];
        return [
            'product' => fake()->name(),
            'category' => fake()->randomElement($categories),
            'brand' => fake()->randomElement($brands),
        ];
    }
}
