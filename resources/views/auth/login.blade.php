@extends('layouts.main')

@section('content')

<form action="{{ route('login') }}" method="post">
 
    @csrf
    <label for="email">Email</label>
    <input type="email" name="email" value="{{ old('email') }}">
    <label for="password">Password</label>
    <input type="password" name="password" value="">
 
    <button>Login</button>
 
</form>

@endsection