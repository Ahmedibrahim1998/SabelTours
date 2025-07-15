<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::latest()->get();
        return view('admin.pages.trips.index', compact('trips'));
    }

    public function show(Trip $trip)
    {
        return view('admin.pages.trips.show', compact('trip'));
    }

    public function edit(Trip $trip)
    {
        return view('admin.pages.trips.edit', compact('trip'));
    }

    public function update(Request $request, Trip $trip)
    {
        $validated = $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email',
            'phone'          => 'required|string|max:20',
            'adults_count'   => 'required|integer|min:1',
            'children_count' => 'nullable|integer|min:0',
            'travel_date'    => 'required|date',
            'message'        => 'nullable|string',
            'gender'         => 'required|in:male,female',
        ]);

        $trip->update($validated);
        toastr()->success(__('messages.Update'));
        return redirect()->route('trips.index');
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();
        toastr()->success(__('messages.Delete'));
        return redirect()->route('trips.index');
    }
}
