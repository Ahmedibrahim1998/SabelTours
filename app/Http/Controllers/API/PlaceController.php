<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index($governorate_id, Request $request)
    {
        // تأكد أن المحافظة موجودة
        $governorate = Governorate::findOrFail($governorate_id);

        $locale = $request->header('Accept-Language', 'en');

        // جلب الأماكن الخاصة بالمحافظة
        $places = $governorate->places->map(function ($place) use ($locale) {
            $name = json_decode($place->name, true);
            $desc = json_decode($place->short_description, true);

            return [
                'id' => $place->id,
                'name' => $name[$locale] ?? $name['en'],
                'short_description' => $desc[$locale] ?? $desc['en'],
                'image' => $place->image,
                'location' => $place->location,
            ];
        });

        return response()->json([
            'governorate' => $governorate->getLocalizedName($locale),
            'places' => $places,
        ]);
    }

    public function show($id, Request $request)
    {
        $locale = $request->header('Accept-Language', 'en');

        $place = \App\Models\Place::with('detail')->findOrFail($id);

        $name = json_decode($place->name, true);
        $short = json_decode($place->short_description, true);

        return response()->json([
            'id' => $place->id,
            'name' => $name[$locale] ?? $name['en'],
            // 'short_description' => $short[$locale] ?? $short['en'],
            'long_description' => optional($place->detail)->getLocalizedDescription($locale),
            'images' => optional($place->detail)->getImages(),
            // 'image' => $place->image,
            // 'location' => $place->location,
        ]);
    }
}
