@extends('layouts.main', [
    'current_menu_item' => 'homepage'
])

@section('content')

    <h1>Amazing Books</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, saepe iure. Voluptatum, explicabo mollitia? Quasi iure hic a consectetur blanditiis corporis vitae tempora vel! Ullam deserunt consequuntur facere recusandae doloribus.</p>

    <h2>Crime books</h2>
    <div class="crime-books">
        @foreach ($crime_books as $book)
            <div class="crime-books__book">
                <h3>{{ $book->title }}</h3>
                Authors: {{ $book->authors->pluck('name')->join(', ') }}  
                {{-- a query is being run to the intermediate author_book table (automatic Laravel magic) --}}
                Published by: {{ $book->publishers->pluck('name')->join(', ') }}  

            </div>
        @endforeach
    </div>
   

    <div id="partners"></div>

    
    @viteReactRefresh
    @vite('resources/js/partners.jsx') 
    
    <div class="container">
        <h1 class="page-title">Latest Books</h1>
        <div id="latest-books"></div>
    </div>

    @vite('resources/js/latest-books.js')

@endsection