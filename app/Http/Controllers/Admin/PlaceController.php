<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::latest()->get();
        return view('admin.pages.places.index', compact('places'));
    }

    public function create()
    {
        $governorates = Governorate::all();
        return view('admin.pages.places.create', compact('governorates'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'governorate_id' => 'required|exists:governorates,id',
                'location' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'image_url' => 'nullable|url',
                'name_ar' => 'required|string|max:255',
                'name_en' => 'required|string|max:255',
                'short_description_ar' => 'required|string',
                'short_description_en' => 'required|string',
                // باقي اللغات اختياري أو تضيفها حسب الحاجة
            ]);

            $place = new Place();

            $place->governorate_id = $request->governorate_id;
            $place->location = $request->location;

            // الاسم
            $place->name = json_encode([
                'ar' => $request->name_ar,
                'es' => $request->name_es,
                'en' => $request->name_en,
                'fr' => $request->name_fr,
                'it' => $request->name_it,
                'de' => $request->name_de,
            ], JSON_UNESCAPED_UNICODE);

            // الوصف
            $place->short_description = json_encode([
                'ar' => $request->short_description_ar,
                'es' => $request->short_description_es,
                'en' => $request->short_description_en,
                'fr' => $request->short_description_fr,
                'it' => $request->short_description_it,
                'de' => $request->short_description_de,
            ], JSON_UNESCAPED_UNICODE);

            // الصورة
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . Str::slug($file->getClientOriginalName());
                $file->move(public_path('uploads/places'), $fileName);
                $place->image = 'uploads/places/' . $fileName;
            } elseif ($request->filled('image_url')) {
                $place->image = $request->image_url;
            }

            $place->save();

            toastr()->success(__('messages.success'));
            return redirect()->route('places.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $place = Place::findOrFail($id);
        return view('admin.pages.places.show', compact('place'));
    }

    public function edit($id)
    {
        $place = Place::findOrFail($id);
        $place->name = json_decode($place->name, true);
        $place->short_description = json_decode($place->short_description, true);

        $governorates = Governorate::all();

        return view('admin.pages.places.edit', compact('place', 'governorates'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'governorate_id' => 'required|exists:governorates,id',
                'location' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'image_url' => 'nullable|url',
                'name_ar' => 'required|string|max:255',
                'name_en' => 'required|string|max:255',
                'short_description_ar' => 'required|string',
                'short_description_en' => 'required|string',
            ]);

            $place = Place::findOrFail($id);

            $place->governorate_id = $request->governorate_id;
            $place->location = $request->location;

            $place->name = json_encode([
                'ar' => $request->name_ar,
                'es' => $request->name_es,
                'en' => $request->name_en,
                'fr' => $request->name_fr,
                'it' => $request->name_it,
                'de' => $request->name_de,
            ], JSON_UNESCAPED_UNICODE);

            $place->short_description = json_encode([
                'ar' => $request->short_description_ar,
                'es' => $request->short_description_es,
                'en' => $request->short_description_en,
                'fr' => $request->short_description_fr,
                'it' => $request->short_description_it,
                'de' => $request->short_description_de,
            ], JSON_UNESCAPED_UNICODE);

            // الصورة
            if ($request->hasFile('image')) {
                if ($place->image && file_exists(public_path($place->image))) {
                    unlink(public_path($place->image));
                }
                $file = $request->file('image');
                $fileName = time() . '_' . Str::slug($file->getClientOriginalName());
                $file->move(public_path('uploads/places'), $fileName);
                $place->image = 'uploads/places/' . $fileName;
            } elseif ($request->filled('image_url')) {
                if ($place->image && file_exists(public_path($place->image))) {
                    unlink(public_path($place->image));
                }
                $place->image = $request->image_url;
            }

            $place->save();

            toastr()->success(__('messages.Update'));
            return redirect()->route('places.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $place = Place::findOrFail($id);
        if ($place->image && file_exists(public_path($place->image))) {
            unlink(public_path($place->image));
        }
        $place->delete();

        toastr()->success(__('messages.Delete'));
        return redirect()->route('places.index');
    }
}
