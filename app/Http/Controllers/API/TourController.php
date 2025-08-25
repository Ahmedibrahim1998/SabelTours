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

public function tourDetailsBySubTourId($sub_tour_id, Request $request)
{
    $locale = $request->header('Accept-Language', 'en');

    // جيب كل التفاصيل المرتبطة بالـ sub_tour_id
    $details = TourDetail::with(['info', 'subTour', 'tour', 'comments'])
        ->where('sub_tour_id', $sub_tour_id)
        ->get();

    if ($details->isEmpty()) {
        return response()->json(['message' => 'No details found for this sub tour'], 404);
    }

    $response = $details->map(function ($detail) use ($locale) {
        $infos = $detail->info->map(function ($info) use ($locale) {
            // الحصول على البيانات متعددة اللغات
            $fromMonth = is_array($info->from_month) 
                ? ($info->from_month[$locale] ?? $info->from_month['en'] ?? '')
                : $info->from_month;
            
            $toMonth = is_array($info->to_month) 
                ? ($info->to_month[$locale] ?? $info->to_month['en'] ?? '')
                : $info->to_month;

            // الحصول على agenda متعددة اللغات
            $agenda = $info->agenda;
            
            return [
                'from_month' => $fromMonth,
                'to_month'   => $toMonth,
                'price'      => $info->price,
                'agenda'     => [
                    'morning' => [
                        'text'   => is_array($agenda['morning'] ?? null)
                            ? ($agenda['morning'][$locale] ?? $agenda['morning']['en'] ?? '')
                            : ($agenda['morning'] ?? ''),
                    ],
                    'noon' => [
                        'text'   => is_array($agenda['noon'] ?? null)
                            ? ($agenda['noon'][$locale] ?? $agenda['noon']['en'] ?? '')
                            : ($agenda['noon'] ?? ''),
                    ],
                    'evening' => [
                        'text'   => is_array($agenda['evening'] ?? null)
                            ? ($agenda['evening'][$locale] ?? $agenda['evening']['en'] ?? '')
                            : ($agenda['evening'] ?? ''),
                    ],
                ],
            ];
        });

        return [
            'id'          => $detail->id,
            'title'       => $detail->title[$locale] ?? '',
            'description' => $detail->description[$locale] ?? '',
            'location'    => is_array($detail->location) ? ($detail->location[$locale] ?? ($detail->location['en'] ?? '')) : ($detail->location ?? ''),
            'image'       => $detail->image,
            'sub_tour'    => $detail->subTour?->name[$locale] ?? '',
            'tour'        => $detail->tour?->name[$locale] ?? '',
            'tour_type'   => $detail->tour?->type,
            'rate'        => round($detail->comments->avg('rating') ?? 0, 1),
            'info'        => $infos,
        ];
    });

    return response()->json($response);
}

  
}
