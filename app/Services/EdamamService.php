<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EdamamService
{
    private $appId;
    private $appKey;

    public function __construct()
    {
        $this->appId = env('EDAMAM_APP_ID');
        $this->appKey = env('EDAMAM_APP_KEY');
    }

    public function getFoodDetails()
    {
        $baseUrl = "https://api.edamam.com/api/food-database/v2/parser";
        $edamamUrlEndpoint = "&app_id={$this->appId}&app_key={$this->appKey}";
        $categoryUrl = "?category=generic-foods" . $edamamUrlEndpoint;
        $response = Http::get($baseUrl . $categoryUrl . $edamamUrlEndpoint);
        dd($response->json());

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }

    // Add other methods as necessary...
}