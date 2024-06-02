<?php

namespace Database\Factories;

use App\Models\FoodEntry;
use App\Models\Chart;
use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodEntryFactory extends Factory
{
    protected $model = FoodEntry::class;

    public function definition()
    {
        return [
            'chart_id' => Chart::factory(),
            'food_id' => Food::factory(),
            'date_tried' => $this->faker->date(),
            'comments' => $this->faker->sentence,
        ];
    }
}