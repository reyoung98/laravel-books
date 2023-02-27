<h1>Books</h1>

@foreach ($books as $book) 
    <li>{{ $book->title }}</li>
@endforeach