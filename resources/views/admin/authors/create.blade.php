@extends('layouts.admin', [
    'current_menu_item' => 'admin'
])

@section('content')

@include('admin.common.left-menu')

<div class="admin-main">
    <h1>Add new author</h1>

    <div class="admin-form-container">
        @if (is_null($author->id)) 
        <form action="{{ route('author.store') }}" method="post">

        @else 
            <form action="{{ route('author.update', $author->id) }}" method="post">
            @method('put')
        @endif

            @csrf
            <label for="name">Author name</label>
            <input type="text" name="name" id="" value="{{ old('name', $author->name) }}">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="" value="{{ old('slug', $author->slug) }}">
            <label for="bio">Bio</label>
            <input type="text" name="bio" id="" value="{{ old('bio', $author->bio) }}">
            <button type="submit">Save</button>
        </form>
    </div>
</div>

@endsection