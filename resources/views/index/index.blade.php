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
    
    <div class="container">
        <h1 class="page-title">Latest Books</h1>
        <div id="latest-books"></div>
    </div>

    <div class="container">
        <h1 class="page-title">Crime Novels</h1>
        <div id="crime-novels"></div>
    </div>

    @vite('resources/js/latest-books.js')

@endsection