@extends('layouts.main')

@section('content')

<h1 class="page-title">Search results: {{$query}}</h1>

<div id="search-results">
    @foreach ($results as $book)
            <a href={{route('book_detail', $book['id'])}} class="book-item"> 
                <img src={{$book['image']}} alt={{$book['title']}}/>
                <div class="book-info">
                    <div class="title">
                        {{$book['title']}}
                    </div>
                    <div class="author">
                        {{ $book->authors->pluck('name')->join(', ') }}
                    </div>
                    <p class="pages">{{ $book->pages }} pages 	&#8226; Published {{ date('Y', strtotime($book->publication_date)) }}</p>
                    @if ($book->categories)
                        <span class="category">{{ $book->categories->name }}</span>
                    @endif
                </div>
            </a>
    @endforeach

    <div class="pagination">
        {{-- @if ($page > 0) --}}
            <form method="get" action="{{ route('search-results') }}">
                <input type="hidden" name="q" value="{{ $query }}">
                <input type="hidden" name="page" value="{{ 0 }}">
                <button class="pagination-btn" type="submit" {{ $page == 0 ? 'disabled' : '' }}>First</button>
            </form>
            <form method="get" action="{{ route('search-results') }}">
                <input type="hidden" name="q" value="{{ $query }}">
                <input type="hidden" name="page" value="{{ $page - 1 }}">
                <button class="pagination-btn" type="submit" {{ $page == 0 ? 'disabled' : '' }}>Previous</button>
            </form>
        {{-- @endif --}}
    
        @if (count($results) > 10)
            <form method="get" action="{{ route('search-results') }}">
                <input type="hidden" name="q" value="{{ $query }}">
                <input type="hidden" name="page" value="{{ $page + 1 }}">
                <button class="pagination-btn" type="submit">Next</button>
            </form>
        @endif
    </div>

</div>


@endsection

{{-- Following script for infinite scroll works but is extremely slow --}}
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var loading = false;
        var count = {{ $count ?? 0 }};

        window.addEventListener('scroll', function() {
            if (window.scrollY + window.innerHeight >= document.documentElement.scrollHeight && !loading) {
                loading = true;
                console.log("doing something...");
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/api/books/load-more?q={{ $query }}&count=' + count);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var books = JSON.parse(xhr.responseText);
                        if (books.length > 0) {
                            var container = document.getElementById('search-results');
                            for (var i = 0; i < books.length; i++) {
                                var book = books[i];
                                var html = '<div class="book">' +
                                    '<h2>' + book.title + '</h2>' +
                                    '<p>Authors: ' + book.authors.map(function(author) { return author.name }).join(', ') + '</p>' +
                                    '<p>Publication date: ' + book.publication_date + '</p>' +
                                '</div>';
                                container.insertAdjacentHTML('beforeend', html);
                            }
                            count += books.length;
                        }
                    }
                    loading = false;
                };
                xhr.send();
            }
        });
    });
</script> --}}
