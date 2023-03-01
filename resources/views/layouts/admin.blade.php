<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    @vite('resources/css/app.scss')
</head>
<body>

    @include('common.navigation', [
        'current_menu_item' => $current_menu_item ?? null
    ])
    <main id="admin-content">
        @yield('content')
    </main>
    
    {{-- @vite('resources/js/app.js') --}}
</body>
</html>