<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;

Route::middleware('can:admin')->group(function() {
    
    // authors
    Route::get('/admin/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/admin/authors/create', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/admin/authors', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/admin/authors/{author_id}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::put('/admin/authors/{author_id}', [AuthorController::class, 'update'])->name('author.update');
    
    // books
    Route::get('/admin/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/admin/books/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/admin/books', [BookController::class, 'store'])->name('book.store');
    Route::get('/admin/books/{book_id}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/admin/books/{book_id}', [BookController::class, 'update'])->name('book.update');

    // users
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
});

