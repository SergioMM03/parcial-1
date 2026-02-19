<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Http\Resources\LoanResource;
use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Response;

class LoanController extends Controller
{
    public function store(LoanRequest $request)
    {
        $book = Book::findOrFail($request->book_id);

        if ($book->copies_available <= 0) {
            return response()->json([
                'error' => 'No hay copias disponibles de este libro.'
            ], Response::HTTP_UNPROCESSABLE_ENTITY); 
        }

        $loan = Loan::create([
            'borrower_name' => $request->borrower_name,
            'book_id' => $book->id,
            'loaned_at' => now(),
        ]);

        $book->copies_available -= 1;
        if ($book->copies_available === 0) {
            $book->status = false; 
        }
        $book->save();

        return (new LoanResource($loan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}