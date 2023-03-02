@extends('layouts.main')

@section('content')

<h1>Welcome to your bookshelf, {{ $user->name }}</h1>

<h3>Your Reading List:</h2>
<div id="reading-list">
    @foreach ($readingList as $book)
        <a class="book-item" href="/book/{{$book->id}}">
            <img src={{$book->image}} alt="{{$book->title}}">
            {{-- <div class="book-title">{{$book->title}}</div> --}}
        </a>
    @endforeach
</div>

<h3>Your Reservations:</h2>
    <div id="reservation-list">
        @foreach ($reservations as $book)
            <a class="book-item" href="/book/{{$book->id}}">
                <img src={{$book->image}} alt="{{$book->title}}">
            </a>
        @endforeach
    </div>

@endsection