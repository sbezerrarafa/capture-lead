<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class GooglePlacesService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('GOOGLE_API_KEY');
    }

    public function searchPlaces($query, $pageToken = null)
    {
        $url = 'https://maps.googleapis.com/maps/api/place/textsearch/json';
        
        $params = [
            'query' => $query,
            'key' => $this->apiKey,
        ];

        if ($pageToken) {
            $params['pagetoken'] = $pageToken;
        }

        $response = $this->client->get($url, [
            'query' => $params,
        ]);

        return json_decode($response->getBody(), true);
    }

    public function getPlaceDetails($placeId)
    {
        $url = 'https://maps.googleapis.com/maps/api/place/details/json';
        $response = $this->client->get($url, [
            'query' => [
                'place_id' => $placeId,
                'key' => $this->apiKey,
                'fields' => 'name,formatted_address,formatted_phone_number,rating,types,website,geometry,url',
                'language' => 'pt-BR'
            ]
        ]);
    
        return json_decode($response->getBody(), true);
    }
    
}