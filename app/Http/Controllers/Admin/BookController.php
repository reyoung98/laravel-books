<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::select('title')
        ->limit(10)
        ->get();

        return view('admin.books', compact('books'));
    }

    public function create()
    {
        $book = new Book;

        return view('admin.createbook', compact('book'));
    }

    public function store(Request $request)
    {
        $book = new Book;

        $book->title = $request->post('title');
        $book->isbn = $request->post('isbn');
        $book->description = $request->post('description');
        $book->publication_date = $request->post('publication_date');
            $slug = strtolower($request->post('title'));
            $slug = str_replace(" ", "-", $slug);
            $slug = $slug . '-' . $request->post('isbn');
        $book->slug = $slug;
        $book->save();

        session()->flash('success_message','Book successfully added!');
        return redirect()->route('book.create');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('admin.createbook', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->title = $request->post('title');
        $book->isbn = $request->post('isbn');
        $book->description = $request->post('description');
        $book->publication_date = $request->post('publication_date');
            $slug = strtolower($request->post('title'));
            $slug = str_replace(" ", "-", $slug);
            $slug = $slug . '-' . $request->post('isbn');
        $book->slug = $slug;
        $book->save();

        session()->flash('success_message', 'Book updated');

        return redirect()->route('book.edit', $id);
    }

    public function latest()
    {
        $latestBooks = Book::orderBy('publication_date', 'desc')
        ->limit(10)
        ->get();

        return($latestBooks);
    }
}
