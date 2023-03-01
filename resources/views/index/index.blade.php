@extends('layouts.main', [
    'current_menu_item' => 'homepage'
])

@section('content')

    {{-- <h2>Crime books</h2>
    <div class="crime-books">
        @foreach ($crime_books as $book)
            <div class="crime-books__book">
                <h3>{{ $book->title }}</h3>
                Authors: {{ $book->authors->pluck('name')->join(', ') }}  
                Published by: {{ $book->publishers->pluck('name')->join(', ') }}  

            </div>
        @endforeach
    </div>
   

    <div id="partners"></div>

    
    @viteReactRefresh
    @vite('resources/js/partners.jsx')  --}}
    
    {{-- <div class="section-container">
        <h1 class="section-title">Latest Books</h1>
        <div class="books-container" id="latest-books"></div>
    </div> --}}

    <div class="section-container">
        <h1 class="section-title">Latest Books</h1>
        <div class="books-container" id="latest_books">
            @foreach ($latest_books as $book)
            <a href="{{ route('book_detail', $book->id) }}" class="book-card">
                <img src={{$book->image}} alt="{{$book->title}}">
            </a>
            @endforeach
        </div>
    </div>

    <div class="section-container">
        <h1 class="section-title">Social Sciences</h1>
        <div class="books-container" id="social-books">
            @foreach ($social_books as $book)
            <a href="{{ route('book_detail', $book->id) }}" class="book-card">
                <img src={{$book->image}} alt="{{$book->title}}"> 
            </a>
            @endforeach
        </div>
    </div>

    <div class="section-container">
        <h1 class="section-title">Crime Novels</h1>
        <div class="books-container" id="crime-novels">
            @foreach ($crime_books as $book)
            <a href="{{ route('book_detail', $book->id) }}" class="book-card">
                <img src={{$book->image}} alt="{{$book->title}}">
            </a>
            @endforeach
        </div>
    </div>

    <div class="section-container">
        <h1 class="section-title">Children's Books</h1>
        <div class="books-container" id="chidrens-books">
            @foreach ($childrens_books as $book)
            <a href="{{ route('book_detail', $book->id) }}" class="book-card">
                <img src={{$book->image}} alt="{{$book->title}}">
            </a>
            @endforeach
        </div>
    </div>

    @vite('resources/js/latest-books.js')

@endsection