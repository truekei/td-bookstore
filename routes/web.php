<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/book', [BookController::class, 'showBooks'])->name('show.books');

Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');

Route::prefix('/rate')->group(function () {
    Route::get('/', [RatingController::class, 'index'])->name('ratings.index');
    Route::post('/submit', [RatingController::class, 'store'])->name('ratings.store');
});
