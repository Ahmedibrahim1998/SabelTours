<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourDetail;
use App\Models\TourDetailInfo;
use Illuminate\Http\Request;

class TourDetailInfoController extends Controller
{
    public function index()
    {
        $tourDetailInfos = TourDetailInfo::with('tourDetail')->latest()->get();
        return view('admin.pages.tour_detail_infos.index', compact('tourDetailInfos'));
    }

    public function create()
    {
        $tourDetails = TourDetail::all();
        return view('admin.pages.tour_detail_infos.create', compact('tourDetails'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tour_detail_id' => 'required|exists:tour_details,id',
            'price' => 'required|numeric|min:0',
            
            'from_month_ar' => 'required|string',
            'from_month_en' => 'required|string',
            'from_month_fr' => 'nullable|string',
            'from_month_es' => 'nullable|string',
            'from_month_it' => 'nullable|string',
            'from_month_de' => 'nullable|string',
            
            'to_month_ar' => 'required|string',
            'to_month_en' => 'required|string',
            'to_month_fr' => 'nullable|string',
            'to_month_es' => 'nullable|string',
            'to_month_it' => 'nullable|string',
            'to_month_de' => 'nullable|string',
            
            'agenda_morning_ar' => 'nullable|string',
            'agenda_morning_en' => 'nullable|string',
            'agenda_morning_fr' => 'nullable|string',
            'agenda_morning_es' => 'nullable|string',
            'agenda_morning_it' => 'nullable|string',
            'agenda_morning_de' => 'nullable|string',
            
            'agenda_noon_ar' => 'nullable|string',
            'agenda_noon_en' => 'nullable|string',
            'agenda_noon_fr' => 'nullable|string',
            'agenda_noon_es' => 'nullable|string',
            'agenda_noon_it' => 'nullable|string',
            'agenda_noon_de' => 'nullable|string',
            
            'agenda_evening_ar' => 'nullable|string',
            'agenda_evening_en' => 'nullable|string',
            'agenda_evening_fr' => 'nullable|string',
            'agenda_evening_es' => 'nullable|string',
            'agenda_evening_it' => 'nullable|string',
            'agenda_evening_de' => 'nullable|string',
        ]);

        try {
            $from_month = [
                'ar' => $request->from_month_ar,
                'en' => $request->from_month_en,
                'fr' => $request->from_month_fr,
                'es' => $request->from_month_es,
                'it' => $request->from_month_it,
                'de' => $request->from_month_de,
            ];

            $to_month = [
                'ar' => $request->to_month_ar,
                'en' => $request->to_month_en,
                'fr' => $request->to_month_fr,
                'es' => $request->to_month_es,
                'it' => $request->to_month_it,
                'de' => $request->to_month_de,
            ];

            $agenda = [
                'morning' => [
                    'ar' => $request->agenda_morning_ar,
                    'en' => $request->agenda_morning_en,
                    'fr' => $request->agenda_morning_fr,
                    'es' => $request->agenda_morning_es,
                    'it' => $request->agenda_morning_it,
                    'de' => $request->agenda_morning_de,
                ],
                'noon' => [
                    'ar' => $request->agenda_noon_ar,
                    'en' => $request->agenda_noon_en,
                    'fr' => $request->agenda_noon_fr,
                    'es' => $request->agenda_noon_es,
                    'it' => $request->agenda_noon_it,
                    'de' => $request->agenda_noon_de,
                ],
                'evening' => [
                    'ar' => $request->agenda_evening_ar,
                    'en' => $request->agenda_evening_en,
                    'fr' => $request->agenda_evening_fr,
                    'es' => $request->agenda_evening_es,
                    'it' => $request->agenda_evening_it,
                    'de' => $request->agenda_evening_de,
                ],
            ];

            TourDetailInfo::create([
                'tour_detail_id' => $request->tour_detail_id,
                'from_month' => $from_month,
                'to_month' => $to_month,
                'agenda' => $agenda,
                'price' => $request->price,
            ]);

            return redirect()->route('tour_detail_infos.index')->with('success', __('messages.success'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $tourDetailInfo = TourDetailInfo::with('tourDetail')->findOrFail($id);
        return view('admin.pages.tour_detail_infos.show', compact('tourDetailInfo'));
    }

    public function edit($id)
    {
        $tourDetailInfo = TourDetailInfo::findOrFail($id);
        $tourDetails = TourDetail::all();
        return view('admin.pages.tour_detail_infos.edit', compact('tourDetailInfo', 'tourDetails'));
    }

    public function update(Request $request, $id)
    {
        $tourDetailInfo = TourDetailInfo::findOrFail($id);

        $request->validate([
            'tour_detail_id' => 'required|exists:tour_details,id',
            'price' => 'required|numeric|min:0',
            
            'from_month_ar' => 'required|string',
            'from_month_en' => 'required|string',
            'from_month_fr' => 'nullable|string',
            'from_month_es' => 'nullable|string',
            'from_month_it' => 'nullable|string',
            'from_month_de' => 'nullable|string',
            
            'to_month_ar' => 'required|string',
            'to_month_en' => 'required|string',
            'to_month_fr' => 'nullable|string',
            'to_month_es' => 'nullable|string',
            'to_month_it' => 'nullable|string',
            'to_month_de' => 'nullable|string',
            
            'agenda_morning_ar' => 'nullable|string',
            'agenda_morning_en' => 'nullable|string',
            'agenda_morning_fr' => 'nullable|string',
            'agenda_morning_es' => 'nullable|string',
            'agenda_morning_it' => 'nullable|string',
            'agenda_morning_de' => 'nullable|string',
            
            'agenda_noon_ar' => 'nullable|string',
            'agenda_noon_en' => 'nullable|string',
            'agenda_noon_fr' => 'nullable|string',
            'agenda_noon_es' => 'nullable|string',
            'agenda_noon_it' => 'nullable|string',
            'agenda_noon_de' => 'nullable|string',
            
            'agenda_evening_ar' => 'nullable|string',
            'agenda_evening_en' => 'nullable|string',
            'agenda_evening_fr' => 'nullable|string',
            'agenda_evening_es' => 'nullable|string',
            'agenda_evening_it' => 'nullable|string',
            'agenda_evening_de' => 'nullable|string',
        ]);

        try {
            $from_month = [
                'ar' => $request->from_month_ar,
                'en' => $request->from_month_en,
                'fr' => $request->from_month_fr,
                'es' => $request->from_month_es,
                'it' => $request->from_month_it,
                'de' => $request->from_month_de,
            ];

            $to_month = [
                'ar' => $request->to_month_ar,
                'en' => $request->to_month_en,
                'fr' => $request->to_month_fr,
                'es' => $request->to_month_es,
                'it' => $request->to_month_it,
                'de' => $request->to_month_de,
            ];

            $agenda = [
                'morning' => [
                    'ar' => $request->agenda_morning_ar,
                    'en' => $request->agenda_morning_en,
                    'fr' => $request->agenda_morning_fr,
                    'es' => $request->agenda_morning_es,
                    'it' => $request->agenda_morning_it,
                    'de' => $request->agenda_morning_de,
                ],
                'noon' => [
                    'ar' => $request->agenda_noon_ar,
                    'en' => $request->agenda_noon_en,
                    'fr' => $request->agenda_noon_fr,
                    'es' => $request->agenda_noon_es,
                    'it' => $request->agenda_noon_it,
                    'de' => $request->agenda_noon_de,
                ],
                'evening' => [
                    'ar' => $request->agenda_evening_ar,
                    'en' => $request->agenda_evening_en,
                    'fr' => $request->agenda_evening_fr,
                    'es' => $request->agenda_evening_es,
                    'it' => $request->agenda_evening_it,
                    'de' => $request->agenda_evening_de,
                ],
            ];

            $tourDetailInfo->update([
                'tour_detail_id' => $request->tour_detail_id,
                'from_month' => $from_month,
                'to_month' => $to_month,
                'agenda' => $agenda,
                'price' => $request->price,
            ]);

            return redirect()->route('tour_detail_infos.index')->with('success', __('messages.Update'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $tourDetailInfo = TourDetailInfo::findOrFail($id);
        $tourDetailInfo->delete();

        return redirect()->route('tour_detail_infos.index')->with('success', __('messages.Delete'));
    }
}
