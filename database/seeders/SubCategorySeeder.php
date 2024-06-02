<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents(storage_path('app\categories.json')), true);
        foreach ($data as $categoryName => $subCategories) {
            // dd($categoryName, $subCategories);
            $category = Category::where('name', $categoryName)->first();

            foreach ($subCategories as $subCategoryName) {
                SubCategory::create([
                    'name' => $subCategoryName,
                    'category_id' => $category->id
                ]);
            }
        }
    }
}
