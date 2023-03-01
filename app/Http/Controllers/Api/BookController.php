<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    public function latest()
    {
        $latestBooks = Book::orderBy('publication_date', 'desc')
        ->with('authors')
        ->limit(10)
        ->get();

        return($latestBooks);
    }

    public function search(Request $request) 
    {
       $search = $request->query('search');
 
       $results = Book::where('title', 'like', "%{$search}%")
       ->orderBy('publication_date', 'desc')
       ->limit(5)
       ->get();
 
       return $results;
    }
}
