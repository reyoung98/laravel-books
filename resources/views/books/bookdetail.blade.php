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
        {{-- <button>Add review</button> --}}
        @auth
        <form action="{{ route('reading_list', $book->id) }}" method="post">
            @csrf
                @if($bookUser)
                    <button class={{$bookUser->onReadingList ? 'green' : ''}}>{{$bookUser->onReadingList ? '✓ On' : 'Add to' }} reading list</button>
                @else <button>Add to reading list</button>
                @endif
        </form>
        <form action="{{ route('reserve_book', $book->id) }}" method="post">
            @csrf
            @if($bookUser)
                <button class={{$bookUser->isReserved ? 'green' : ''}}>{{$bookUser->isReserved ? '✓ Reserved' : 'Reserve book' }}</button>
            @else <button>Reserve book</button>
            @endif

            </form>
        @endauth
    </div>
</div>




</div>

@endsection