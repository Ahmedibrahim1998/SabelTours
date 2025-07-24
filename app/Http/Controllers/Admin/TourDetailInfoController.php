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
            'from_month' => 'required|string',
            'to_month' => 'required|string',
            'price' => 'required|numeric|min:0',
            'agenda_morning' => 'nullable|string',
            'agenda_noon' => 'nullable|string',
            'agenda_evening' => 'nullable|string',
        ]);

        try {
            $agenda = [
                'morning' => $request->input('agenda_morning'),
                'noon' => $request->input('agenda_noon'),
                'evening' => $request->input('agenda_evening'),
            ];

            TourDetailInfo::create([
                'tour_detail_id' => $request->tour_detail_id,
                'agenda' => json_encode($agenda),
                'from_month' => $request->from_month,
                'to_month' => $request->to_month,
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

        // تحويل agenda إلى مصفوفة إذا كانت نص JSON
        if (is_string($tourDetailInfo->agenda)) {
            $tourDetailInfo->agenda = json_decode($tourDetailInfo->agenda, true);
        }

        return view('admin.pages.tour_detail_infos.show', compact('tourDetailInfo'));
    }

    public function edit($id)
    {
        $tourDetailInfo = TourDetailInfo::findOrFail($id);
        $tourDetails = TourDetail::all();

        // تحويل agenda إلى مصفوفة لعرضها في نموذج التحرير
        if (is_string($tourDetailInfo->agenda)) {
            $tourDetailInfo->agenda = json_decode($tourDetailInfo->agenda, true);
        }

        return view('admin.pages.tour_detail_infos.edit', compact('tourDetailInfo', 'tourDetails'));
    }

    public function update(Request $request, $id)
    {
        $tourDetailInfo = TourDetailInfo::findOrFail($id);

        $request->validate([
            'tour_detail_id' => 'required|exists:tour_details,id',
            'from_month' => 'required|string',
            'to_month' => 'required|string',
            'price' => 'required|numeric|min:0',
            'agenda_morning' => 'nullable|string',
            'agenda_noon' => 'nullable|string',
            'agenda_evening' => 'nullable|string',
        ]);

        try {
            $agenda = [
                'morning' => $request->input('agenda_morning'),
                'noon' => $request->input('agenda_noon'),
                'evening' => $request->input('agenda_evening'),
            ];

            $tourDetailInfo->update([
                'tour_detail_id' => $request->tour_detail_id,
                'agenda' => json_encode($agenda),
                'from_month' => $request->from_month,
                'to_month' => $request->to_month,
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
