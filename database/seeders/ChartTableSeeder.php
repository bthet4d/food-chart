<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chart;

class ChartTableSeeder extends Seeder
{
    public function run()
    {
        Chart::factory()->count(50)->create();
    }
}