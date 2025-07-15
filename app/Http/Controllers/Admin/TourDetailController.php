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
            'rate' => 'required|integer|min:1|max:5',
            'from_month' => 'required|string',
            'to_month' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'nullable|string',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
        ]);

        try {
            // التجهيز للحقول متعددة اللغات
            $description = [
                'ar' => $request->input('description_ar'),
                'en' => $request->input('description_en'),
                'fr' => $request->input('description_fr'),
                'es' => $request->input('description_es'),
                'it' => $request->input('description_it'),
                'de' => $request->input('description_de'),
            ];

            // معالجة الأجندة (تُرسل من النموذج بصيغة مصفوفة مباشرة)
            $agenda = $request->input('agenda');

            // حفظ الصورة
            $fileName = time() . '_' . Str::slug($request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('uploads/tour_details'), $fileName);
            $imagePath = 'uploads/tour_details/' . $fileName;

            // حفظ السجل
            TourDetail::create([
                'tour_id'      => $request->tour_id,
                'sub_tour_id'  => $request->sub_tour_id,
                'image'        => $imagePath,
                'description'  => $description, // تلقائياً يُحفظ كـ JSON
                'rate'         => $request->rate,
                'agenda'       => $agenda, // تلقائياً يُحفظ كـ JSON
                'from_month'   => $request->from_month,
                'to_month'     => $request->to_month,
                'price'        => $request->price,
                'location'     => $request->location,
            ]);

            return redirect()->route('tour_details.index')->with('success', __('messages.success'));

        } catch (\Exception $e) {
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
            'rate' => 'required|integer|min:1|max:5',
            'from_month' => 'required|string',
            'to_month' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'nullable|string',
            'description_ar' => 'required|string',
            'description_en' => 'required|string'
        ]);

        try {
            $description = [
                'ar' => $request->description_ar,
                'en' => $request->description_en,
                'fr' => $request->description_fr,
                'es' => $request->description_es,
                'it' => $request->description_it,
                'de' => $request->description_de,
            ];

            $agenda = [
                'morning' => [
                    'text' => $request->morning_text,
                    'images' => explode(',', $request->morning_images)
                ],
                'noon' => [
                    'text' => $request->noon_text,
                    'images' => explode(',', $request->noon_images)
                ],
                'evening' => [
                    'text' => $request->evening_text,
                    'images' => explode(',', $request->evening_images)
                ],
            ];

            if ($request->hasFile('image')) {
                if ($tourDetail->image && file_exists(public_path($tourDetail->image))) {
                    unlink(public_path($tourDetail->image));
                }
                $fileName = time() . '_' . Str::slug($request->file('image')->getClientOriginalName());
                $request->file('image')->move(public_path('uploads/tour_details'), $fileName);
                $tourDetail->image = 'uploads/tour_details/' . $fileName;
            }

            $tourDetail->update([
                'tour_id' => $request->tour_id,
                'sub_tour_id' => $request->sub_tour_id,
                'description' => json_encode($description, JSON_UNESCAPED_UNICODE),
                'agenda' => json_encode($agenda, JSON_UNESCAPED_UNICODE),
                'rate' => $request->rate,
                'from_month' => $request->from_month,
                'to_month' => $request->to_month,
                'price' => $request->price,
                'location' => $request->location,
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
