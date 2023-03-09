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

    // public function getMoreBooks(Request $request)
    // {
    //     $input = $request->input();
    //     $query = $input['q'];
    //     $count = $input['count'];

    //     $results = Book::where('title', 'like', "%{$query}%")
    //         ->orderBy('publication_date', 'desc')
    //         ->with('authors')
    //         ->offset($count)
    //         ->limit(15)
    //         ->get();

    //     return response()->json($results);
    // }
    
}
