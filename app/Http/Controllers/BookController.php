<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
   public function show($id)
   {

       $book = Book::with('authors')->findOrFail($id); 
    //    dd($book);
       return view('books.bookdetail', compact('book'));
   }
   
}
