<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Books</title>
    @vite('resources/css/app.scss')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

    @include('common.navigation', [
        'current_menu_item' => $current_menu_item ?? null
    ])

    {{-- @include('common.alerts') --}}

    <main id="main-content">
        @yield('content')
    </main>
    
    @vite('resources/js/app.js')
</body>
</html>