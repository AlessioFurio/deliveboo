<header>
    <div class="filter"></div>
    <div class="header-top">
        <div class="logo">
            <a href="#">
                <img src="{{ asset('images/logo.png') }}" alt="deliveboo-logo">
            </a>
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

                <select class="category-select" name="">
                    <option value="">Seleziona categoria</option>
                    <option value="">Categoria</option>
                    <option value="">Categoria</option>
                    <option value="">Categoria</option>
                </select>
            </div>
        </div>
    </div>
</header>
