<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\BookUser;
use DB;

class HomeController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        // $readingList = BookUser::where('user_id',auth()->id())
        // ->where('onReadingList', true)
        // ->get();

        $readingList = DB::table('book_user')
        ->join('books', 'book_user.book_id', '=', 'books.id')
        ->where('user_id', auth()->id())
        ->where('onReadingList', true)
        ->select('books.id', 'books.title', 'books.image')
        ->orderBy('book_user.updated_at', 'desc')
        ->get();

        $reservations = DB::table('book_user')
        ->join('books', 'book_user.book_id', '=', 'books.id')
        ->where('user_id', auth()->id())
        ->where('isReserved', true)
        ->select('books.id', 'books.title', 'books.image')
        ->orderBy('book_user.updated_at', 'desc')
        ->get();

        return view('auth.home', compact('user', 'readingList', 'reservations'));
    }
}
