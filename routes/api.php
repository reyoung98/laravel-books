<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// the prefix /api is automatic in this file (api.php) -- defined in Providers/RouteServiceProvider
        // api/books/latest
Route::get('/books/latest', [BookController::class, 'latest']);

    // path is actually api/users
Route::get('/users', [UserController::class, 'index']);

Route::get('/books/search', [BookController::class, 'search']);
