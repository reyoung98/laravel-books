<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $latest_books = Book::orderBy('publication_date', 'desc')
        ->with('authors')
        ->limit(10)
        ->get();

        $crime_books = Book::where('category_2_id', 12)
        ->orderBy('publication_date', 'desc')
        ->with(['authors' ,'publishers']) // name of relationship method in Book model, Publisher model
        ->limit(10)
        ->get();

        $childrens_books = Book::where('category_1_id', 16)
        ->orderBy('publication_date', 'desc')
        ->with(['authors' ,'publishers']) 
        ->limit(10)
        ->get();

        $social_books = Book::where('category_1_id', 98)
        ->orderBy('publication_date', 'desc')
        ->with(['authors' ,'publishers']) 
        ->limit(10)
        ->get();


        return view('index.index', compact('latest_books','crime_books', 'childrens_books', 'social_books'));
    }
}
