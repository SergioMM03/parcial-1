<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        $total = $this->faker->numberBetween(1, 10);
        $available = $this->faker->numberBetween(0, $total);

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'isbn' => $this->faker->unique()->isbn13(),
            'copies_total' => $total,
            'copies_available' => $available,
            'status' => $available > 0,
        ];
    }
}