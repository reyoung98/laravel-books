<nav>
    <a href="{{ route('homepage') }}" >
        Home 
    </a>
    <a href="{{ route('authors.index') }}" >
        Authors
    </a>
    <a href="{{ route('books.index') }}" >
        Books
    </a>

    @auth

    <a href="/home"> {{ auth()->user()->email }}</a>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button>Logout</button>
        </form>
    @endauth

</nav>