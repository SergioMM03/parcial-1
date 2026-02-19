<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrower_name',
        'book_id',
        'loaned_at',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}