<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'gender'         => 'required|in:male,female',
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email',
            'phone'          => 'required|string|max:20',
            'adults_count'   => 'required|integer|min:1',
            'children_count' => 'nullable|integer|min:0',
            'travel_date'    => 'required|date',
            'message'        => 'nullable|string',
        ]);

        $trip = Trip::create($validated);

        return response()->json([
            'message' => 'Trip booking created successfully.',
            'data'    => $trip
        ], 201);
    }
}
