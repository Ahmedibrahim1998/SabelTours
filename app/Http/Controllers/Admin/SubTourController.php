<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubTour;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubTourController extends Controller
{
    public function index()
    {
        $subTours = SubTour::with('tour')->latest()->get();
        return view('admin.pages.sub_tours.index', compact('subTours'));
    }

    public function create()
    {
        $tours = Tour::all();
        return view('admin.pages.sub_tours.create', compact('tours'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_url' => 'nullable|string',
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
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

            $imagePath = null;

            if ($request->hasFile('image')) {
                $fileName = time() . '_' . Str::slug($request->file('image')->getClientOriginalName());
                $request->file('image')->move(public_path('uploads/sub_tours'), $fileName);
                $imagePath = 'uploads/sub_tours/' . $fileName;
            } elseif ($request->filled('image_url')) {
                $imagePath = trim($request->image_url);
            }

            SubTour::create([
                'tour_id' => $request->tour_id,
                'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
                'image' => $imagePath,
            ]);

            return redirect()->route('sub-tours.index')->with('success', __('messages.success'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $subTour = SubTour::with('tour')->findOrFail($id);
        $subTour->name = json_decode($subTour->name, true);
        return view('admin.pages.sub_tours.show', compact('subTour'));
    }


    public function edit($id)
    {
        $subTour = SubTour::findOrFail($id);
        $tours = Tour::all();
        $subTour->name = json_decode($subTour->name, true);
        return view('admin.pages.sub_tours.edit', compact('subTour', 'tours'));
    }

    public function update(Request $request, $id)
    {
        $subTour = SubTour::findOrFail($id);

        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_url' => 'nullable|string',
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
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

            if ($request->hasFile('image')) {
                if ($subTour->image && file_exists(public_path($subTour->image))) {
                    unlink(public_path($subTour->image));
                }
                $fileName = time() . '_' . Str::slug($request->file('image')->getClientOriginalName());
                $request->file('image')->move(public_path('uploads/sub_tours'), $fileName);
                $subTour->image = 'uploads/sub_tours/' . $fileName;
            } elseif ($request->filled('image_url')) {
                $subTour->image = trim($request->image_url);
            }

            $subTour->tour_id = $request->tour_id;
            $subTour->name = json_encode($name, JSON_UNESCAPED_UNICODE);
            $subTour->save();

            return redirect()->route('sub-tours.index')->with('success', __('messages.Update'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $subTour = SubTour::findOrFail($id);
        if ($subTour->image && file_exists(public_path($subTour->image))) {
            unlink(public_path($subTour->image));
        }
        $subTour->delete();

        return redirect()->route('sub-tours.index')->with('success', __('messages.Delete'));
    }
}
