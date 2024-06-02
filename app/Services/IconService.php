<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class IconService
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('FLATICON_API_KEY');
    }

    public function getIcon($query)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey
        ])->get('https://api.flaticon.com/v2/items/icons/search', [
            'query' => $query
        ]);

        if ($response->successful()) {
            $icons = $response->json()['data']['icons'];
            if (count($icons) > 0) {
                return $icons[0]['svg']['url'];
            }
        }

        return null;
    }
}