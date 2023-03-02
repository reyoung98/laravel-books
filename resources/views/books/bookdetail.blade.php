@extends('layouts.main')

@section('content')

<div id="book-detail">
    <img src="{{$book->image}}" alt="{{$book->title}}">
    <div class="book-container">
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

    <div id="reviews-section">
        @if($reviews->count() > 0)
            <h3>Community Reviews</h3>
            @foreach($reviews as $review)
            <div class="review-container">
                <div>{{$review->text}}</div>
            </div>
            @endforeach
        @endif
    </div>
    
    @auth
       <div id="review-form">
            @include('common.alerts')
        
            <h3>Write a review</h3> 
            <form action="{{ route('review.save', $book->id) }}" method="post">
                @csrf
                <textarea name="review" id="" cols="30" rows="10"></textarea>
               <button>Submit review</button>
            </form>
       </div>
    @endauth
</div>
</div>


@endsection