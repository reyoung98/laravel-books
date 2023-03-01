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