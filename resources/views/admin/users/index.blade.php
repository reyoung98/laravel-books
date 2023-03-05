@extends('layouts.admin', [
    'current_menu_item' => 'admin'
])

@section('content')
@include('admin.common.left-menu')

<div class="admin-main">
    {{-- Div with id ROOT for react application --}}
    <div id="root"></div>
</div>

@viteReactRefresh
@vite('resources/js/user-list/user-list.jsx')

@endsection