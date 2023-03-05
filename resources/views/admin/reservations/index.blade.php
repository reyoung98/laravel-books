@extends('layouts.admin', [
    'current_menu_item' => 'admin'
])

@section('content')

@include('admin.common.left-menu')

<div class="admin-main">

<h1>Reservations</h1>
    @foreach ($reservations as $reservation)
    <a class="reserved-item" href="{{route('book_detail',$reservation->book_id)}}">
        <img src="{{$reservation->image}}">
       <div class="reservation-info">
            <div>{{$reservation->name}}</div>
            <div>{{$reservation->email}}</div>
            <div>{{$reservation->title}}</div>
            <div>Book ID: {{$reservation->book_id}}</div>
       </div>
    </a>
@endforeach
</div>

@endsection