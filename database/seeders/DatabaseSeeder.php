<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ClassicsSeeder::class);
        Book::factory(90)->create();
    }
}