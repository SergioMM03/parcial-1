<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class ClassicsSeeder extends Seeder
{
    public function run()
    {
        $csvFile = fopen(database_path('data/libros.csv'), 'r');
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ',')) !== FALSE) {
            if (!$firstline) {
                Book::create([
                    'title' => $data[0],
                    'description' => $data[1],
                    'isbn' => $data[2],
                    'copies_total' => $data[3],
                    'copies_available' => $data[4],
                    'status' => $data[5] === '1',
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}