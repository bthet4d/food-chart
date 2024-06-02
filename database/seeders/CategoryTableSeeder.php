<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run()
    {
        $categories = json_decode(file_get_contents(storage_path('app\categories.json')), true);
        foreach ($categories as $categoryName => $category) {
            // dd($category, $categoryName);
            Category::create([
                'name' => $categoryName
            ]);
        }
    }
}
