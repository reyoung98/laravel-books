@extends('layouts.main', [
    'current_menu_item' => 'homepage'
])

@section('content')

    <h1>Amazing Books</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, saepe iure. Voluptatum, explicabo mollitia? Quasi iure hic a consectetur blanditiis corporis vitae tempora vel! Ullam deserunt consequuntur facere recusandae doloribus.</p>

    <div id="partners"></div>

    
    @viteReactRefresh
    @vite('resources/js/partners.jsx') 
    
    <div class="container">
        <h1 class="page-title">Latest Books</h1>
        <div id="latest-books"></div>
    </div>
    
    @vite('resources/js/latest-books.js')

@endsection