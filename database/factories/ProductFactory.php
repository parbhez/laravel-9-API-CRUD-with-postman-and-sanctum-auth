<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

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
        return [
            'name' => $this->faker->sentence(6),
            'price' => rand(100,500),
            'slug' => str($this->faker->sentence(6))->slug(),
            'is_featured' => rand(1,10) % 2 == 0 ? true : false,
            'description' =>$this->faker->text()
        ];
    }
}
