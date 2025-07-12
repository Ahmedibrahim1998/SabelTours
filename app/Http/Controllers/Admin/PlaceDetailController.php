<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\PlaceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaceDetailController extends Controller
{
    public function index()
    {
        $placeDetails = PlaceDetail::latest()->with('place')->get();
        return view('admin.pages.place_details.index', compact('placeDetails'));
    }

    public function create()
    {
        $places = Place::all();
        return view('admin.pages.place_details.create', compact('places'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'place_id' => 'required|exists:places,id',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_urls' => 'nullable|string', // روابط خارجية مفصولة بفاصلة
            'long_description_ar' => 'required|string',
            'long_description_en' => 'required|string',
        ]);

        try {
            $long_description = [
                'ar' => $request->long_description_ar,
                'en' => $request->long_description_en,
                'fr' => $request->long_description_fr,
                'es' => $request->long_description_es,
                'it' => $request->long_description_it,
                'de' => $request->long_description_de,
            ];

            $imagesPaths = [];

            // الصور من الجهاز
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $fileName = time() . '_' . Str::slug($file->getClientOriginalName());
                    $file->move(public_path('uploads/place_details'), $fileName);
                    $imagesPaths[] = 'uploads/place_details/' . $fileName;
                }
            }

            // الصور من روابط خارجية
            if ($request->filled('image_urls')) {
                $urls = explode(',', $request->image_urls);
                foreach ($urls as $url) {
                    $imagesPaths[] = trim($url);
                }
            }

            PlaceDetail::create([
                'place_id' => $request->place_id,
                'long_description' => json_encode($long_description, JSON_UNESCAPED_UNICODE),
                'images' => json_encode($imagesPaths, JSON_UNESCAPED_UNICODE),
            ]);

            toastr()->success(__('messages.success'));
            return redirect()->route('place-details.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $placeDetail = PlaceDetail::with('place')->findOrFail($id);
        return view('admin.pages.place_details.show', compact('placeDetail'));
    }

    public function edit($id)
    {
        $placeDetail = PlaceDetail::findOrFail($id);
        $places = Place::all();

        // decode the fields
        $placeDetail->long_description = json_decode($placeDetail->long_description, true);
        $placeDetail->images = json_decode($placeDetail->images, true);

        return view('admin.pages.place_details.edit', compact('placeDetail', 'places'));
    }

    public function update(Request $request, $id)
    {
        $placeDetail = PlaceDetail::findOrFail($id);

        $request->validate([
            'place_id' => 'required|exists:places,id',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_urls' => 'nullable|string',
            'long_description_ar' => 'required|string',
            'long_description_en' => 'required|string',
        ]);

        try {
            $placeDetail->place_id = $request->place_id;

            $long_description = [
                'ar' => $request->long_description_ar,
                'en' => $request->long_description_en,
                'fr' => $request->long_description_fr,
                'es' => $request->long_description_es,
                'it' => $request->long_description_it,
                'de' => $request->long_description_de,
            ];
            $placeDetail->long_description = json_encode($long_description, JSON_UNESCAPED_UNICODE);

            $newImages = [];

            if ($request->hasFile('images')) {
                // حذف الصور القديمة
                foreach (json_decode($placeDetail->images, true) ?? [] as $oldImage) {
                    if (!Str::startsWith($oldImage, ['http://', 'https://']) && file_exists(public_path($oldImage))) {
                        unlink(public_path($oldImage));
                    }
                }

                // رفع الصور الجديدة
                foreach ($request->file('images') as $file) {
                    $fileName = time() . '_' . Str::slug($file->getClientOriginalName());
                    $file->move(public_path('uploads/place_details'), $fileName);
                    $newImages[] = 'uploads/place_details/' . $fileName;
                }
            }

            // روابط الصور
            if ($request->filled('image_urls')) {
                $urls = explode(',', $request->image_urls);
                foreach ($urls as $url) {
                    $newImages[] = trim($url);
                }
            }

            if (!empty($newImages)) {
                $placeDetail->images = json_encode($newImages, JSON_UNESCAPED_UNICODE);
            }

            $placeDetail->save();

            toastr()->success(__('messages.Update'));
            return redirect()->route('place-details.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $placeDetail = PlaceDetail::findOrFail($id);

        // حذف الصور من السيرفر
        foreach (json_decode($placeDetail->images, true) ?? [] as $img) {
            if (file_exists(public_path($img))) {
                unlink(public_path($img));
            }
        }

        $placeDetail->delete();

        toastr()->success(__('messages.Delete'));
        return redirect()->route('place-details.index');
    }
}
