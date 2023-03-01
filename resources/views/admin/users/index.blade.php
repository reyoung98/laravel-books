@extends('layouts.admin')

@section('content')

{{-- Div with id ROOT for react application --}}
<div id="root"></div>

@viteReactRefresh
@vite('resources/js/user-list/user-list.jsx')

@endsection