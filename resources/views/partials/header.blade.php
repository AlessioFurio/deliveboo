<header>
    <div class="header-top">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="deliveboo-logo">
        </div>

        <div class="nav-menu-top">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="cart">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </div>

    </div>

    <div class="header-bottom">
        <div class="nav-menu-bottom">
            <ul>
                <li><a href="">Categoria</a></li>
                <li><a href="">Categoria</a></li>
                <li><a href="">Categoria</a></li>
                <li><a href="">Categoria</a></li>
                <li><a href="">Categoria</a></li>
            </ul>
        </div>
    </div>
</header>
