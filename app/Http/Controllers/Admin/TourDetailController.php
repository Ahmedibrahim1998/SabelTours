<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\SubTour;
use App\Models\TourDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourDetailController extends Controller
{
    public function index()
    {
        $tourDetails = TourDetail::with('tour', 'subTour')->latest()->get();
        return view('admin.pages.tour_details.index', compact('tourDetails'));
    }

    public function create()
    {
        $tours = Tour::all();
        $subTours = SubTour::all();
        return view('admin.pages.tour_details.create', compact('tours', 'subTours'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'sub_tour_id' => 'nullable|exists:sub_tours,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $title = [
                'ar' => $request->input('title_ar'),
                'en' => $request->input('title_en'),
                'fr' => $request->input('title_fr'),
                'es' => $request->input('title_es'),
                'it' => $request->input('title_it'),
                'de' => $request->input('title_de'),
            ];

            $description = [
                'ar' => $request->input('description_ar'),
                'en' => $request->input('description_en'),
                'fr' => $request->input('description_fr'),
                'es' => $request->input('description_es'),
                'it' => $request->input('description_it'),
                'de' => $request->input('description_de'),
            ];

            $location = [
                'ar' => $request->input('location_ar'),
                'en' => $request->input('location_en'),
                'fr' => $request->input('location_fr'),
                'es' => $request->input('location_es'),
                'it' => $request->input('location_it'),
                'de' => $request->input('location_de'),
            ];

            $file = $request->file('image');
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);
            $fileName = time() . '_' . Str::slug($nameWithoutExtension) . '.' . $extension;
            $file->move(public_path('uploads/tour_details'), $fileName);
            $imagePath = 'uploads/tour_details/' . $fileName;

            TourDetail::create([
                'tour_id' => $request->tour_id,
                'sub_tour_id' => $request->sub_tour_id,
                'image' => $imagePath,
                'title' => $title,
                'description' => $description,
                'location' => $location,
            ]);

            return redirect()->route('tour_details.index')->with('success', __('messages.success'));
        } catch (\Exception $e) {
            return $e;
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $tourDetail = TourDetail::with('tour', 'subTour')->findOrFail($id);

        // ضمان تحويل النصوص إلى مصفوفة عند الحاجة
        if (is_string($tourDetail->description)) {
            $tourDetail->description = json_decode($tourDetail->description, true);
        }

        if (is_string($tourDetail->agenda)) {
            $tourDetail->agenda = json_decode($tourDetail->agenda, true);
        }

        return view('admin.pages.tour_details.show', compact('tourDetail'));
    }
    public function edit($id)
    {
        $tourDetail = TourDetail::findOrFail($id);
        $tours = Tour::all();
        $subTours = SubTour::all();
        return view('admin.pages.tour_details.edit', compact('tourDetail', 'tours', 'subTours'));
    }

    public function update(Request $request, $id)
    {
        $tourDetail = TourDetail::findOrFail($id);

        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'sub_tour_id' => 'nullable|exists:sub_tours,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'location_ar' => 'nullable|string',
            'location_en' => 'nullable|string',
            'location_fr' => 'nullable|string',
            'location_es' => 'nullable|string',
            'location_it' => 'nullable|string',
            'location_de' => 'nullable|string',
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
        ]);

        try {
            $title = [
                'ar' => $request->input('title_ar'),
                'en' => $request->input('title_en'),
                'fr' => $request->input('title_fr'),
                'es' => $request->input('title_es'),
                'it' => $request->input('title_it'),
                'de' => $request->input('title_de'),
            ];

            $description = [
                'ar' => $request->input('description_ar'),
                'en' => $request->input('description_en'),
                'fr' => $request->input('description_fr'),
                'es' => $request->input('description_es'),
                'it' => $request->input('description_it'),
                'de' => $request->input('description_de'),
            ];

            $location = [
                'ar' => $request->input('location_ar'),
                'en' => $request->input('location_en'),
                'fr' => $request->input('location_fr'),
                'es' => $request->input('location_es'),
                'it' => $request->input('location_it'),
                'de' => $request->input('location_de'),
            ];


            if ($request->hasFile('image')) {
                // حذف الصورة القديمة إن وُجدت وكانت محلية (وليست رابط خارجي)
                if ($tourDetail->image && !Str::startsWith($tourDetail->image, ['http://', 'https://'])) {
                    $oldImagePath = public_path($tourDetail->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // رفع الصورة الجديدة
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/tour_details/' . $fileName;
                $file->move(public_path('uploads/tour_details'), $fileName);
                $tourDetail->image = $filePath;
            }

            $tourDetail->update([
                'tour_id' => $request->tour_id,
                'sub_tour_id' => $request->sub_tour_id,
                'title' => $title,
                'description' => $description,
                'location' => $location,
            ]);

            return redirect()->route('tour_details.index')->with('success', __('messages.Update'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        $tourDetail = TourDetail::findOrFail($id);

        if ($tourDetail->image && file_exists(public_path($tourDetail->image))) {
            unlink(public_path($tourDetail->image));
        }

        $tourDetail->delete();

        return redirect()->route('tour_details.index')->with('success', __('messages.Delete'));
    }
}
