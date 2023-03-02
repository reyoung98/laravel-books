@extends('layouts.main')

@section('content')

<h1>Welcome to your bookshelf, {{ $user->name }}</h1>

@if ($readingList->count() == 0 && $reservations->count() == 0)
    <a href="{{route('homepage')}}">Browse our books</a> to reserve a book or add it to your reading list.
@endif

@if ($readingList->count() > 0)
    <h3>Your Reading List:</h2>
    <div id="reading-list">
        @foreach ($readingList as $book)
            <a class="book-item" href="/book/{{$book->id}}">
                <img src={{$book->image}} alt="{{$book->title}}">
                {{-- <div class="book-title">{{$book->title}}</div> --}}
            </a>
        @endforeach
    </div>
@endif

@if ($reservations->count() > 0)
    <h3>Your Reservations:</h2>
    <div id="reservation-list">
        @foreach ($reservations as $book)
            <a class="book-item" href="/book/{{$book->id}}">
                <img src={{$book->image}} alt="{{$book->title}}">
            </a>
        @endforeach
    </div>
@endif

@endsection