<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourDetail;
use Illuminate\Http\Request;

class TourController extends Controller
{
   public function index(Request $request)
{
    $locale = $request->header('Accept-Language', 'en');
    $type = $request->header('type'); // قراءة النوع من الهيدر

    if (!in_array($type, ['nile', 'city', 'natural', 'desert'])) {
        return response()->json(['message' => 'Invalid tour type.'], 422);
    }

    $tours = Tour::where('type', $type)->latest()->take(3)->get()->map(function ($tour) use ($locale, $type) {
        return [
            'id'          => $tour->id,
            'name'        => $tour->getLocalizedName($locale),
            'description' => $tour->getLocalizedDescription($locale),
            'type'        => $tour->type,
            'image'       => $tour->image,
            'gallery'     => method_exists($tour, 'getGalleryImages') ? $tour->getGalleryImages() : [],
            'showDetailsDirectly' => $type === 'desert', // ✅ فقط يظهر التفاصيل مباشرة لهذا النوع
        ];
    });

    return response()->json($tours);
}


    public function show($id)
    {
        $locale = request()->header('Accept-Language', 'en');

        $detail = TourDetail::with('tour.comments')->findOrFail($id);

        // حساب متوسط التقييم من التعليقات
        $averageRating = $detail->tour->comments->avg('rating') ?? 0;

        // تجهيز الأجندة بصيغة منظمة
        $agenda = collect($detail->agenda)->map(function ($item) {
            return [
                'text'  => $item['text'] ?? '',
            ];
        });

        return response()->json([
            'tour_detail_id' => $detail->id,
            'tour_id'        => $detail->tour_id,
            'tour_name'      => $detail->tour->getLocalizedName($locale),
            'tour_type'      => $detail->tour->type,
            'image'          => $detail->image,
            'description'    => $detail->description[$locale] ?? '',
            'agenda'         => $agenda,
            'from_month'     => $detail->from_month,
            'to_month'       => $detail->to_month,
            'price'          => $detail->price,
            'location'       => $detail->location,
            'rate'           => round($averageRating, 1),
        ]);
    }
  
}
