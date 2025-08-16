<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/book', [BookController::class, 'showBooks'])->name('show.books');

Route::prefix('/authors')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('authors.index');
});
