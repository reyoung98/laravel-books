<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookUser;
use DB;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = DB::table('book_user')
        ->join('books', 'book_user.book_id', '=', 'books.id')
        ->join('users', 'book_user.user_id', '=', 'users.id')
        ->where('isReserved', true)
        ->select('book_user.book_id', 'books.title', 'books.image', 'users.id', 'users.email', 'users.name')
        // ->orderBy('book_user.user_id')
        ->orderBy('book_user.updated_at', 'desc')
        ->get();

        return view('admin.reservations.index', compact('reservations'));
    }
}
