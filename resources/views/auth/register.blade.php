@extends('layouts.main')

@section('content')

<form action="{{ route('register') }}" method="post">
 
    @csrf
 
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') }}">
 
    <label for="email">Email</label>
    <input type="email" name="email" value="{{ old('email') }}">
 
    <label for="password">Password</label>
    <input type="password" name="password" value="">
    
    <label for="password_confirmation">Confirm password</label>
    <input type="password" name="password_confirmation" value="">
 
    <button>Register</button>
 
</form>

@endsection