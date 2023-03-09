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
        $page = $request->input('page', 1); // default to first page

        $search = $request->input('q');
    
        $results = Book::where('title', 'like', "%{$search}%")
        ->orderBy('publication_date', 'desc')
        ->with('authors')
        ->offset(($page - 1) * 15) // Skip previous pages
        ->limit(15) // Limit to 15 results per page
        ->get();
        
        return view('books.search', compact('results', 'query', 'page'));
    }
}
