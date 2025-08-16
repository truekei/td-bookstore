<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = DB::table('ratings')
                    ->join('books', 'ratings.book_id', '=', 'books.id')
                    ->join('authors', 'books.author_id', '=', 'authors.id')
                    ->join('categories', 'books.category_id', '=', 'categories.id')
                    ->select('books.title as title',
                            'authors.name as author_name',
                            'categories.name as category_name',
                            DB::raw('COUNT(ratings.id) as rating_count'),
                            DB::raw('ROUND(AVG(ratings.rating), 1) AS avg_review'),
                            )
                    ->groupBy('books.title', 'authors.name', 'categories.name')
                    ->orderBy('avg_review', 'desc')
                    ->limit(10)
                    ->get();

        return view('home', compact('books'));
    }

    public function showBooks(Request $request)
    {
        $keyword = $request->keyword ?? '';
        $qty = $request->qty;

        $books = DB::table('ratings')
                    ->join('books', 'ratings.book_id', '=', 'books.id')
                    ->join('authors', 'books.author_id', '=', 'authors.id')
                    ->join('categories', 'books.category_id', '=', 'categories.id')
                    ->select('books.title as title',
                            'authors.name as author_name',
                            'categories.name as category_name',
                            DB::raw('COUNT(ratings.id) as rating_count'),
                            DB::raw('ROUND(AVG(ratings.rating), 1) AS avg_review'),
                            )
                    ->groupBy('books.title', 'authors.name', 'categories.name')
                    ->where('books.title', 'like', '%' . $keyword . '%')
                    ->orWhere('authors.name', 'like', '%' . $keyword . '%')
                    ->orderBy('avg_review', 'desc')
                    ->limit($qty)
                    ->get();

        return view('home', compact('books'));
    }
}
