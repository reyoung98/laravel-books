@extends('layouts.main')

@section('content')

<h1 class="page-title">Search results: {{$query}}</h1>

<div id="search-results">
    @foreach ($results as $result)
            <a href={{route('book_detail', $result['id'])}} class="book-item"> 
                <img src={{$result['image']}} alt={{$result['title']}}/>
                <div class="book-info">
                    <div class="title">
                        {{$result['title']}}
                    </div>
                    <div class="author">
                        {{ $result->authors->pluck('name')->join(', ') }}
                    </div>
                </div>
            </a>
    @endforeach
</div>

@endsection