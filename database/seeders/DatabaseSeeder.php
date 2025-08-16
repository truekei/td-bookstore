<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Rating;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Author::factory(100)->create();
        Category::factory(300)->create();
        Book::factory(1000)->create();
        Rating::factory(5000)->create();
    }
}
