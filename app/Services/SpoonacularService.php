<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SpoonacularService
{
    private $apiKey;
    
    public function __construct()
    {
        $this->apiKey = env('SPOONACULAR_API_KEY');
    }
    /*
    * process the json list of foods
      for each food, get the details from the API
        save the details to the database
    */
    public function getFoods()
    {
        $json = Storage::disk('local')->get('foods.json');
        $foods = json_decode($json, true);
        foreach ($foods as $food) {
            $spoonacularId = $this->getFoodByName($food['name']);
            $foodDetails = $this->getFoodDetails($spoonacularId);
            dd($foodDetails);
        }
    }

    public function getFoodDetails($id)
    {
        $response = Http::get("https://api.spoonacular.com/food/ingredients/{$id}/information?apiKey={$this->apiKey}");

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }

    public function getFoodByName ($name) {
        $response = Http::get("https://api.spoonacular.com/food/ingredients/search?query={$name}&number=1&apiKey={$this->apiKey}");
        
        if ($response->successful()) {
            $resp = $response->json();
            return $resp['results'][0]['id'];

        }
        return [];
    }
}