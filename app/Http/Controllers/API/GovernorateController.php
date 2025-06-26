<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
   public function index(Request $request)
    {
        // تحديد اللغة المطلوبة من الهيدر، أو الإنجليزية كافتراضي
        $locale = $request->header('Accept-Language', 'en');

        $governorates = Governorate::all()->map(function ($gov) use ($locale) {
            $name = json_decode($gov->name, true);

            return [
                'id' => $gov->id,
                'name' => $name[$locale] ?? $name['en'], // الاسم حسب اللغة
                'places_count' => $gov->places_count,
                'image' => $gov->image,
            ];
        });

        return response()->json($governorates);
    }
}
