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

        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        $author = new Author;

        return view('admin.authors.create', compact('author'));
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

    public function edit($id)
    {
        $author = Author::findOrFail($id);

        return view('admin.authors.create', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $author->slug = $request->post('name');
        $author->name = $request->post('slug');
        $author->bio = $request->post('bio');
        $author->save();

        session()->flash('success_message','Author successfully added!');
        return redirect()->route('author.edit', $id);
    }
}
