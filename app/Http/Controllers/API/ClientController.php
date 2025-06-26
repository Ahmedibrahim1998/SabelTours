<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $locale = $request->header('Accept-Language', 'en');

        $clients = Client::latest()->take(4)->get()->map(function ($client) use ($locale) {
            return [
                'image' => $client->image,
                'name' => $client->getLocalizedName($locale),
                'date' => $client->date,
                'description' => $client->getLocalizedDescription($locale),
                'rate' => round($client->averageRating(), 1) ?? 0,
            ];
        });

        return response()->json($clients);
    }

}


