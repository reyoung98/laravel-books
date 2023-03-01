@extends('layouts.main')

@section('content')

<div id="book-detail">
<img src="{{$book->image}}" alt="{{$book->title}}">
<div class="book-info">
    <h2>{{$book->title}}</h2>
    <p>{{ $book->authors->pluck('name')->join(', ') }} </p>
    <p class="pages">{{ $book->pages }} pages 	&#8226; Published {{ date('Y', strtotime($book->publication_date)) }}</p>
    <span class="category">{{ $book->categories->name }}</span>
</div>

</div>

@endsection