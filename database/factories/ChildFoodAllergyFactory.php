<?php
namespace Database\Factories;

use App\Models\Child;
use App\Models\Food;
use App\Models\ChildFoodAllergy;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildFoodAllergyFactory extends Factory
{
    protected $model = ChildFoodAllergy::class;

    public function definition()
    {
        return [
            'child_id' => function () {
                return Child::factory()->create()->id;
            },
            'food_id' => function () {
                return Food::factory()->create()->id;
            },
        ];
    }
}