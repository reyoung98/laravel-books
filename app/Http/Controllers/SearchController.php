<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    public function showResults(Request $request)
    {
        $input = $request->input();
        $query = $input['q'];

        $search = $request->input('q');
    
        $results = Book::where('title', 'like', "%{$search}%")
        ->orderBy('publication_date', 'desc')
        ->with('authors')
        ->limit(25)
        ->get();
        
        return view('books.search', compact('results', 'query'));
    }
}
