@extends('layouts.admin', [
    'current_menu_item' => 'admin'
])

@section('content')

@include('admin.common.left-menu')

<div class="admin-main">
    <h1>Books</h1>
    
    @foreach ($books as $book) 
        <li>{{ $book->title }}</li>
    @endforeach

    <a href="{{route('book.create')}}">Add new book</a>
</div>

@endsection