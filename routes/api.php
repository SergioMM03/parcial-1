<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;

Route::get('/books', [BookController::class, 'index']);
Route::post('/loans', [LoanController::class, 'store']);