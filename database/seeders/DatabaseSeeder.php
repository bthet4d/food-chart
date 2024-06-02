<?php

Namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Child;
use App\Models\Chart;
use App\Models\Food;
use App\Models\Pantry;
use App\Models\PantryUser;
use App\Models\PantryItem;
use App\Models\FoodEntry;
use App\Models\Family;
use App\Models\ToyChest;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(FoodTableSeeder::class);
        $this->call(RoleTableSeeder::class);

        //add admin user
        User::factory()->count(1)->create([
            'role_id' => 3,            
        ]);
        // Create Parents (Users)
        $families = Family::factory()->count(1)->create();
        
        foreach ($families as $family) {
            //create pantry for each family
            $pantry = Pantry::factory()->create([
                'family_id' => $family->id,
                'name' => 'Pantry for ' . $family->name,
            ]);
            // Create Two Users for each family with type Parent
            $parents = User::factory()->count(2)->create([
                'family_id' => $family->id,
                'role_id' => 1,               
            ]);

            // Create Children for each family
            $children = User::factory()->count(3)->create([
                'family_id' => $family->id,
                'role_id' => 2,
                'age' => 8,
                
            ]);

            // Create Chart for each child
            foreach($children as $child) {
                $chart = Chart::factory()->create([
                    'user_id' => $child->id,
                ]);
                $pantryUsers = PantryUser::factory()->create([
                    'pantry_id' => $pantry->id,
                    'user_id' => $child->id,
                ]);
                //add toy chest for each child
                $toyChest = ToyChest::factory()->create([
                    'user_id' => $child->id,
                    'name' => 'Toy Chest for ' . $child->name,
                ]);
            }
        }
    }
}
