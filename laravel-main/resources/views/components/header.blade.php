<header>
    <h1>CARS - Authenatication User</h1>
    <a href="{{route('indexLink')}}">Home</a>
    <a href="{{route('createCarLink')}}">Add Car</a>

    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">User</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

</header>