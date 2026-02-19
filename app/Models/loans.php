<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'isbn',
        'copies_total',
        'copies_available',
        'status',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}