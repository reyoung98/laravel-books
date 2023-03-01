@extends('layouts.main')

@section('content')

<div id="book-detail">
<img src="{{$book->image}}" alt="{{$book->title}}">
<div class="book-info">
    <h2>{{$book->title}}</h2>
    <p>{{ $book->authors->pluck('name')->join(', ') }} </p>
    <p class="pages">{{ $book->pages }} pages 	&#8226; Published {{ date('Y', strtotime($book->publication_date)) }}</p>
    <span class="category">{{ $book->categories->name }}</span>
    <div class="description">{{ strip_tags($book->description) }} ...</div>
    <div class="ctas">
        <button>Add review</button>
        <button>Add to reading list</button>
        <button>Reserve book</button>
    </div>
</div>




</div>

@endsection