<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
        $locale = $request->header('Accept-Language', 'en');
        $about = AboutUs::first();

        return response()->json([
            'team_name'  => $about->team_name,
            'about_text' => $about->getLocalizedField('about_text', $locale),
            'goals'      => $about->getLocalizedField('goals', $locale),
            'images'     => $about->getImages(),
        ]);
    }
}
