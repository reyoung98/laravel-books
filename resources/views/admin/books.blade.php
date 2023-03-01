@extends('layouts.main')

@section('content')

<h1>Books</h1>

@foreach ($books as $book) 
    <li>{{ $book->title }}</li>
@endforeach

@endsection