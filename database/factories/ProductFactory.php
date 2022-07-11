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
        return [
            'barcode' => $this->faker->unique()->numberBetween(1000, 99999),
            'title' => $this->faker->words(5, true),
            'price' => $this->faker->numberBetween(100, 1000),
            'unit_id' => $this->faker->numberBetween(1, 100),
            'photos' => $this->faker->shuffleArray([])
        ];
    }
}
