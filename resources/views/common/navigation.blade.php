<nav>
    <a href="{{ route('homepage') }}">
        @if($current_menu_item === 'homepage')
            <strong>Home</strong>   
        @else
           Home 
        @endif
    </a>
    <a href="{{ route('about-us') }}">
        
        @if($current_menu_item === 'about-us')
            <strong>About</strong>   
        @else
            About 
        @endif
    </a>
</nav>