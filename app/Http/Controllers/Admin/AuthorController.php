<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::select('name')
        ->limit(10)
        ->get();

        // dd($authors);

        return view('admin.authors', compact('authors'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $author = new Author;

        $author->slug = $request->post('name');
        $author->name = $request->post('slug');
        $author->bio = $request->post('bio');
        $author->save();

        session()->flash('success_message','Author successfully added!');
        return redirect()->route('author.create');

    }
}
