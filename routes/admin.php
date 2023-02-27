<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;

Route::get('/admin/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::post('/admin/authors', [AuthorController::class, 'store'])->name('author.store');
Route::get('/admin/authors/create', [AuthorController::class, 'create'])->name('author.create');
Route::get('/admin/books', [BookController::class, 'index'])->name('books.index');
Route::get('/admin/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/admin/books', [BookController::class, 'store'])->name('book.store');
Route::get('/admin/books/{book_id}', [BookController::class, 'edit'])->name('book.edit');
Route::put('/admin/books/{book_id}', [BookController::class, 'update'])->name('book.update');


