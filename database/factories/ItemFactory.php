<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'code' => 'BRG' . str_pad($this->faker->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),
            'brand' => $this->faker->word(),
            'unit' => 'pcs',
            // 'gambar' => $this->faker->imageUrl(640, 480, 'person', true),
            'price' => $this->faker->numberBetween(2000, 5000),
            'stock' => $this->faker->numberBetween(10, 100),
            'minimum_stock' => $this->faker->numberBetween(10, 100),
            'category_id' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->text(),
        ];
    }
}
