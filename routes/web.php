<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('allbooks');
})->middleware(['auth', 'verified'])->name('allbooks');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about-crud', function () {
    return view('about-crud');
})->name('about-crud');

Route::get('/books', [BookController::class, 'index'])->middleware(['auth', 'verified'])->name('books');
Route::delete('/books/delete/{id}', [BookController::class, 'remove_relation'])->middleware(['auth', 'verified'])->name('book.remove');
Route::get('/books/read', [BooksController::class, 'show'])->middleware(['auth', 'verified'])->name('books.read');
Route::get('/books/{book}', [BookController::class, 'show'])->middleware(['auth', 'verified'])->name('book');
Route::post('/books/add/{id}', [BookUserController::class, 'store'])->middleware(['auth', 'verified'])->name('book-user.store');
Route::patch('/books/{id}', [BookController::class, 'updateHasRead'])->middleware(['auth', 'verified'])->name('book.hasread');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
