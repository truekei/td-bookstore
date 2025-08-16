<?php

use App\Models\Book;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/book', [BookController::class, 'showBooks'])->name('show.books');
