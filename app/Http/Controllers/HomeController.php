<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $crime_books = Book::where('category_2_id', 12)
        ->orderBy('publication_date', 'desc')
        ->with(['authors' ,'publishers']) // name of relationship method in Book model, Publisher model
        ->limit(10)
        ->get();

        return view('index.index', compact('crime_books'));
    }
}
