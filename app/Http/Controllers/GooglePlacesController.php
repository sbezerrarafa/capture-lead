<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GooglePlacesService;
use Illuminate\Support\Facades\Log;

class GooglePlacesController extends Controller
{
    protected $googlePlacesService;

    public function __construct(GooglePlacesService $googlePlacesService)
    {
        $this->googlePlacesService = $googlePlacesService;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $placesDetails = [];
        $nextPageToken = null;

        do {
            $results = $this->googlePlacesService->searchPlaces($query, $nextPageToken);

            if (isset($results['results'])) {
                foreach ($results['results'] as $place) {
                    $details = $this->googlePlacesService->getPlaceDetails($place['place_id']);
                    if ($details) {
                        $placesDetails[] = $details;
                    }
                }
                $nextPageToken = $results['next_page_token'] ?? null;
            }

            if ($nextPageToken) {
                sleep(2);
            }

        } while ($nextPageToken);

        return view('places.search', [
            'placesDetails' => $placesDetails,
            'query' => $query,
        ]);
    }
}
