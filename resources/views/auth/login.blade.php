@extends('layouts.main')

@section('content')

<div class="form-container">
<h2>LOG IN</h2>
<form action="{{ route('login') }}" method="post">
 
    @csrf
    <label for="email">Email</label>
    <input type="email" name="email" value="{{ old('email') }}">
    <label for="password">Password</label>
    <input type="password" name="password" value="">
 
    <button>Login</button>
    
</form>
</div>

@endsection