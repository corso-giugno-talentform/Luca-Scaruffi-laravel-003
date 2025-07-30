<?php

use App\Models\Book;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rotta per la homepage che mostrerà tutti i libri
Route::get('/', [BookController::class, 'index'])->name('books.index');

// Rotta per mostrare il form di creazione di un nuovo libro
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// Rotta per salvare un nuovo libro nel database
Route::post('/books', [BookController::class, 'store'])->name('books.store');
