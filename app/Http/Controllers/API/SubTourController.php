<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class SubTourController extends Controller
{
    public function indexByType(Request $request)
    {
        $locale = $request->header('Accept-Language', 'en');
        $type = $request->header('type');

        if (!in_array($type, ['nile', 'city', 'natural'])) {
            return response()->json(['message' => 'Invalid type'], 422);
        }

        $tours = Tour::with('subTours')->where('type', $type)->get();

        $result = [];

        foreach ($tours as $tour) {
            foreach ($tour->subTours as $sub) {
                $result[] = [
                    'tour_name'  => $tour->getLocalizedName($locale), 
                    'id'      => $sub->id,
                    'name'    => $sub->name[$locale] ?? '',
                    'image'   => $sub->image,
                ];
            }
        }

        return response()->json($result);
    }
}

