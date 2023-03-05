@extends('layouts.admin', [
    'current_menu_item' => 'admin'
])

@section('content')

@include('admin.common.left-menu')

    <div class="admin-main">
        <h1>Authors</h1>
    
        @foreach ($authors as $author)
            <li>{{ $author->name }} </li>
        @endforeach
    
        <a href="{{route('author.create')}}">Add new author</a>
    </div>

    {{-- @include('admin.create') --}}

@endsection