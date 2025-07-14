<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();
        return view('admin.pages.books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('admin.pages.books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('admin.pages.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'required|string',
            'travel_date'=> 'required|date',
            'stay_duration'     => 'required|integer|min:1',
            'children_count'    => 'nullable|integer|min:0',
            'number_person'     => 'required|integer|min:1',
            'accommodation_type'=> 'required|in:family,single,shared',
            'accommodation_message' => 'nullable|string',
            'gender'    => 'required|in:male,female',
            'message'   => 'nullable|string',
        ]);

        $book->update($validated);
        toastr()->success(__('messages.Update'));
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        toastr()->success(__('messages.Delete'));
        return redirect()->route('books.index');
    }
}
