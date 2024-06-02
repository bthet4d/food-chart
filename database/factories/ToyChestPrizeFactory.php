<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ToyChestPrize>
 */
class ToyChestPrizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'toy_chest_id' => function () {
                return \App\Models\ToyChest::factory()->create()->id;
            },
            'prize_id' => function () {
                return \App\Models\Prize::factory()->create()->id;
            },
        ];
    }
}
