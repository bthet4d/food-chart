<?php

namespace Database\Factories;

use App\Models\Pantry;
use App\Models\Family;
use Illuminate\Database\Eloquent\Factories\Factory;

class PantryFactory extends Factory
{
    protected $model = Pantry::class;

    public function definition()
    {
        return [
            'name' => function () {
                return $this->faker->word();
            },
            'description' => $this->faker->sentence(),
            'family_id' => function () {
                return Family::factory()->create()->id;
            },
        ];
    }
}