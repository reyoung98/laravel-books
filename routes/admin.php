<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthorController;

Route::get('/admin/authors', [AuthorController::class, 'index'])->name('admin.authors');
Route::post('/admin/authors', [AuthorController::class, 'store'])->name('author.store');
Route::get('/admin/authors/create', [AuthorController::class, 'create'])->name('author.create');


