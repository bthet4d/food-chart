<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodEntry;

class FoodEntryTableSeeder extends Seeder
{
    public function run()
    {
        FoodEntry::factory()->count(50)->create();
    }
}