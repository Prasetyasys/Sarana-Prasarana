<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailBarangMasuk>
 */
class DetailBarangMasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'incoming_item_code' => 'BM' . str_pad($this->faker->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),
            'item_code' => $this->faker->numberBetween(1, 10),
            'quantity' => $this->faker->numberBetween(1, 10)
        ];
    }
}
