<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        return view('rating', [
            'authors' => Author::all(),
            'books' => Book::all(),
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        Rating::create($validatedData);

        return redirect()->route('home')->with('success', 'Rating submitted successfully.');
    }
}
