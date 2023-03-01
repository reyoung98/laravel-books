<nav>
    <a class="menu-item" href="{{ route('homepage') }}" @if($current_menu_item === 'homepage') class='selected' @endif>
        Home 
    </a>
    <a class="menu-item" href="{{ route('about-us') }}" @if($current_menu_item === 'about-us') class='selected' @endif>
        About
    </a>

    @can('admin')
        <a class="menu-item" href="{{route('books.index')}}">Admin</a>
    @endcan

    @guest
        <a href="{{ route('login') }}">Log in</a> 
        <a href="{{ route('register') }} ">Register</a>             <!-- name of route as defined by Fortify -->
    @endguest

    @auth

    <span>Logged in as <a href="/home"> {{ auth()->user()->email }}</a></span>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button>Logout</button>
        </form>
    @endauth

</nav>