<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'borrower_name' => $this->borrower_name,
            'book_id' => $this->book_id,
            'loaned_at' => $this->loaned_at,
            'book' => [
                'title' => $this->book->title,
                'isbn' => $this->book->isbn,
                'copies_available' => $this->book->copies_available,
                'status' => (bool) $this->book->status,
            ],
        ];
    }
}