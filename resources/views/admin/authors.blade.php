@extends('layouts.admin')

@section('content')

    <h1>Authors</h1>

    @foreach ($authors as $author)
        <li>{{ $author->name }} </li>
    @endforeach

    <a href="{{route('author.create')}}">Add new author</a>

    {{-- @include('admin.create') --}}

@endsection