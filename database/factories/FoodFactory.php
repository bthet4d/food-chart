<?php

namespace Database\Factories;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    protected $model = Food::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'calories' => $this->faker->numberBetween(50, 500),
            'protein' => $this->faker->randomFloat(2, 0, 100),
            'carbohydrates' => $this->faker->randomFloat(2, 0, 100),
            'fat' => $this->faker->randomFloat(2, 0, 100),
            'serving_size' => $this->faker->randomElement(['1 cup', '100g', '1 slice', '1 piece']),
            'category_id' => Category::factory()->create()->id,
        ];
    }
}