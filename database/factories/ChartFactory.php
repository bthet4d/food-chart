<?php

namespace Database\Factories;

use App\Models\Chart;
use App\Models\User;
use App\Models\Prize;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChartFactory extends Factory
{
    protected $model = Chart::class;

    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'grid_columns' => $this->faker->numberBetween(1, 10),
            'grid_rows' => $this->faker->numberBetween(1, 10),
        ];
    }
}