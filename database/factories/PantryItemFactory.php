<?php

namespace Database\Factories;

use App\Models\PantryItem;
use App\Models\Food;
use App\Models\Pantry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PantryItem>
 */
class PantryItemFactory extends Factory
{
    protected $model = PantryItem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'food_id' => function () {
                return Food::factory()->create()->id;
            },
            'pantry_id' => function () {
                return Pantry::factory()->create()->id;
            },
        ];
    }
}
