<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

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

Route::get('/', [IndexController::class, 'index'])->name('homepage');
Route::get('/about', [AboutController::class, 'index'])->name('about-us');

Route::get('/home', [HomeController::class, 'home'])->middleware('auth')->name('home');

Route::get('/book/{book_id}', [BookController::class, 'show'])->name('book_detail');
Route::post('/book/{book_id}/review', [ReviewController::class, 'save'])->name('review.save');

// testing with api
Route::get('/api/test/array', [TestController::class, 'arrayResponse']);
Route::get('/api/test/model', [TestController::class, 'modelResponse']);
Route::get('/api/test/collection', [TestController::class, 'collectionResponse']);

Route::post('/book/add/{book_id}', [BookController::class, 'addToReadingList'])->name('reading_list');
Route::post('/book/reserve/{book_id}', [BookController::class, 'reserveBook'])->name('reserve_book');
