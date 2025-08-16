<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $authors = DB::table('ratings')
                    ->join('books', 'ratings.book_id', '=', 'books.id')
                    ->join('authors', 'books.author_id', '=', 'authors.id')
                    ->where('ratings.rating', '>', 5)
                    ->select('authors.name', DB::raw('COUNT(ratings.id) as total_ratings'))
                    ->groupBy('authors.name')
                    ->orderBy('total_ratings', 'desc')
                    ->limit(10)
                    ->get();

        return view('authors', compact('authors'));
    }
}
