<?php
namespace Database\Seeders;

use App\Models\Child;
use App\Models\Food;
use App\Models\ChildFoodAllergy;
use Illuminate\Database\Seeder;

class ChildFoodAllergySeeder extends Seeder
{
    public function run()
    {
        $children = Child::all();
        $foods = Food::all();

        foreach ($children as $child) {
            $allergies = $foods->random(rand(1, 3));
            foreach ($allergies as $food) {
                ChildFoodAllergy::factory()->create([
                    'child_id' => $child->id,
                    'food_id' => $food->id,
                ]);
            }
        }
    }
}