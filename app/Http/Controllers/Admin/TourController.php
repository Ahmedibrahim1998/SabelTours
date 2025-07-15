<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::latest()->get();
        return view('admin.pages.tours.index', compact('tours'));
    }

    public function create()
    {
        return view('admin.pages.tours.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:nile,city,natural,desert',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gallery_urls' => 'nullable|string',

            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        try {
            $name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
                'fr' => $request->name_fr,
                'es' => $request->name_es,
                'it' => $request->name_it,
                'de' => $request->name_de,
            ];

            $description = [
                'ar' => $request->description_ar,
                'en' => $request->description_en,
                'fr' => $request->description_fr,
                'es' => $request->description_es,
                'it' => $request->description_it,
                'de' => $request->description_de,
            ];

            // رفع الصورة الرئيسية
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . Str::slug($request->file('image')->getClientOriginalName());
                $request->file('image')->move(public_path('uploads/tours'), $imageName);
                $imagePath = 'uploads/tours/' . $imageName;
            }

            $gallery = [];

            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $file) {
                    $fileName = time() . '_' . Str::slug($file->getClientOriginalName());
                    $file->move(public_path('uploads/tours/gallery'), $fileName);
                    $gallery[] = 'uploads/tours/gallery/' . $fileName;
                }
            }

            if ($request->filled('gallery_urls')) {
                $urls = explode(',', $request->gallery_urls);
                foreach ($urls as $url) {
                    $gallery[] = trim($url);
                }
            }

            Tour::create([
                'name' => $name,
                'description' => $description,
                'type' => $request->type,
                'image' => $imagePath,
                'gallery' => $gallery,
            ]);

            toastr()->success(__('messages.success'));
            return redirect()->route('tours.index');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $tour = Tour::findOrFail($id);
        return view('admin.pages.tours.show', compact('tour'));
    }

    public function edit($id)
    {
        $tour = Tour::findOrFail($id);
        return view('admin.pages.tours.edit', compact('tour'));
    }

    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);

        $request->validate([
            'type' => 'required|in:nile,city,natural,desert',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gallery_urls' => 'nullable|string',

            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        try {
            $tour->type = $request->type;

            $tour->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
                'fr' => $request->name_fr,
                'es' => $request->name_es,
                'it' => $request->name_it,
                'de' => $request->name_de,
            ];

            $tour->description = [
                'ar' => $request->description_ar,
                'en' => $request->description_en,
                'fr' => $request->description_fr,
                'es' => $request->description_es,
                'it' => $request->description_it,
                'de' => $request->description_de,
            ];

            // الصورة الرئيسية
            if ($request->hasFile('image')) {
                if (file_exists(public_path($tour->image))) {
                    unlink(public_path($tour->image));
                }
                $fileName = time() . '_' . Str::slug($request->file('image')->getClientOriginalName());
                $request->file('image')->move(public_path('uploads/tours'), $fileName);
                $tour->image = 'uploads/tours/' . $fileName;
            }

            $newGallery = [];

            if ($request->hasFile('gallery')) {
                foreach ($tour->gallery ?? [] as $old) {
                    if (!Str::startsWith($old, ['http', 'https']) && file_exists(public_path($old))) {
                        unlink(public_path($old));
                    }
                }

                foreach ($request->file('gallery') as $file) {
                    $fileName = time() . '_' . Str::slug($file->getClientOriginalName());
                    $file->move(public_path('uploads/tours/gallery'), $fileName);
                    $newGallery[] = 'uploads/tours/gallery/' . $fileName;
                }
            }

            if ($request->filled('gallery_urls')) {
                $urls = explode(',', $request->gallery_urls);
                foreach ($urls as $url) {
                    $newGallery[] = trim($url);
                }
            }

            if (!empty($newGallery)) {
                $tour->gallery = $newGallery;
            }

            $tour->save();

            toastr()->success(__('messages.Update'));
            return redirect()->route('tours.index');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);

        if (file_exists(public_path($tour->image))) {
            unlink(public_path($tour->image));
        }

        foreach ($tour->gallery ?? [] as $img) {
            if (!Str::startsWith($img, ['http', 'https']) && file_exists(public_path($img))) {
                unlink(public_path($img));
            }
        }

        $tour->delete();

        toastr()->success(__('messages.Delete'));
        return redirect()->route('tours.index');
    }
}
