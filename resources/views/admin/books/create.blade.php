@extends('layouts.admin')

@section('content')

<h1>Add new book</h1>

@if (is_null($book->id)) 
<form action="{{ route('book.store') }}" method="post">

@else 
    <form action="{{ route('book.update', $book->id) }}" method="post">
    @method('put')
@endif

    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" id="" value="{{ old('title', $book->title) }}">
    <label for="isbn">ISBN</label>
    <input type="text" name="isbn" id="" value="{{ old('isbn', $book->isbn) }}">
    <label for="publication_date">Publication date</label>
    <input type="date" name="publication_date" id="" value="{{ old('publication_date', $book->publication_date) }}"">
    <label for="isbn">Description</label>
    <textarea name="description" id="">{{ old('description', $book->description) }}></textarea>
    <button type="submit">Save</button>
</form>

@endsection