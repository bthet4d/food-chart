<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Services\SpoonacularService;
// use App\Services\EdamamService;
// use App\Services\IconService;
use App\Models\Food;
use App\Models\SubCategory;
use App\Models\Category;

class FoodTableSeeder extends Seeder
{
    // private $spoonacular = new SpoonacularService();
    // private $edamam = new EdamamService();
    // private $icon = new IconService();
    public function run()
    {
        $foodData = json_decode(file_get_contents(storage_path('app\updatedFoods.json')), true);
        foreach ($foodData as $categoryName => $foods) {
            $category = Category::where('name', $categoryName)->first();
            foreach ($foods as $food) {
                
                $subCategory = SubCategory::where('name', $food['subcategory'])->first();
                //if subcategory is not found, create it
                if(!$subCategory){
                    $subCategory = SubCategory::create([
                        'name' => $food['subcategory'],
                        'category_id' => $category->id,
                    ]);
                    $subCategoryId = $subCategory->id;
                } else {
                    $subCategoryId = $subCategory->id;
                }

                Food::create([
                    'name' => $food['name'],
                    'sub_category_id' => $subCategoryId,
                ]);
                
            }
        }
    }
}