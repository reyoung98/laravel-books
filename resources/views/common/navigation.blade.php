<nav>
    <a href="{{ route('homepage') }}" @if($current_menu_item === 'homepage') class='selected' @endif>
        Home 
    </a>
    <a href="{{ route('about-us') }}" @if($current_menu_item === 'about-us') class='selected' @endif>
        About
    </a>

    @guest
        <a href="{{ route('login') }}">Log in</a> 
        <a href="{{ route('register') }} ">Register</a>             <!-- name of route as defined by Fortify -->
    @endguest

    @auth

    {{-- Logged in as {{ auth()->user()->email }} --}}

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button>Logout</button>
        </form>
    @endauth

</nav>