<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'            => 'required|string|max:255',
            'last_name'             => 'required|string|max:255',
            'email'                 => 'required|email|max:255',
            'phone'                 => 'required|string|max:20',
            'travel_date'           => 'required|date',
            'stay_duration'         => 'required|integer|min:1',
            'children_count'        => 'nullable|integer|min:0',
	        'number_person'         => 'nullable|integer|min:0',
            'accommodation_type'    => 'required|in:family,single,shared',
            'accommodation_message' => 'nullable|string|max:1000',
            'gender'                => 'required|in:male,female',
            'message'               => 'nullable|string|max:1000',
        ]);

        $book = Book::create($validated);

        return response()->json([
            'message' => 'Booking successful!',
            'data' => $book
        ], 201);
    }
}
