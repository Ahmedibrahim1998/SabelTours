<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
     // GET /api/sections
    public function index(Request $request)
    {
        $locale = $request->header('Accept-Language', 'en');

        $sections = Section::all()->map(function ($section) use ($locale) {
            return [
                'id' => $section->id,
                'name' => $section->getLocalizedName($locale),
                // 'short_description' => $section->getLocalizedDescription($locale),
                'image' => $section->image,
                'type' => $section->type,
            ];
        });

        return response()->json($sections);
    }

    public function show($id, Request $request)
    {
        $locale = $request->header('Accept-Language', 'en');
        $section = Section::with('details')->findOrFail($id);

        // Practical_Information: فقط عرض المحتوى
        if ($section->type === 'Practical_Information') {
            $detail = $section->details->first();

            return response()->json([
                'title' => $detail->title,
                'content' => $detail ? $detail->getLocalizedContent($locale) : null,
            ]);
        }

        // باقي الأنواع
        $data = [
            'id' => $section->id,
            'name' => $section->getLocalizedName($locale),
            'short_description' => $section->getLocalizedDescription($locale),
            'image' => $section->image,
            'type' => $section->type,
        ];

        switch ($section->type) {
            case 'Climate':
                $data['climate_articles'] = $section->details->map(function ($d) use ($locale) {
                    return [
                        'title' => $d->title,
                        'image' => $d->image,
                        'content' => $d->getLocalizedContent($locale),
                    ];
                });
                break;

            case 'Essential':
                $detail = $section->details->first();
                $data['article'] = $detail ? $detail->getLocalizedContent($locale) : null;
                $data['images'] = $detail ? $detail->getImages() : [];
                break;

           case 'Practical_Information':
                $data['Practical_Information'] = $section->details->map(function ($d) use ($locale) {
                    return [
                        'title' => $d->title,
                        'content' => $d->getLocalizedContent($locale),
                    ];
                });
                break;
        }

        return response()->json($data);
    }


}