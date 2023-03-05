<nav>
    <a class="menu-item {{ $current_menu_item === 'homepage' ? 'selected' : '' }}" href="{{ route('homepage') }}">
        Home 
    </a>
    <a class="menu-item {{ $current_menu_item === 'about-us' ? 'selected' : '' }}" href="{{ route('about-us') }}">
        About
    </a>

    @can('admin')
        <a class="menu-item {{ $current_menu_item === 'admin' ? 'selected' : '' }}" href="{{route('books.index')}}">Admin</a>
    @endcan
    
    @include('common.search')
    
    @guest
        <a class="menu-link" href="{{ route('login') }}">Log in</a> 
        <a class="menu-btn" href="{{ route('register') }}"><button>Sign up</button></a>             <!-- name of route as defined by Fortify -->
    @endguest


    @auth

        <div class="username"><a href="/home"> {{ auth()->user()->email }}</a></div>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button>Logout</button>
        </form>
    @endauth

</nav>