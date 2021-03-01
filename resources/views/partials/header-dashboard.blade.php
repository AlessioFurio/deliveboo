<header :class="isActive ? 'active' : ''">

    <div class="wp-header-dashboard">
        <div class="filter"></div>

        <div id="menu-fixed">

            <div class="header-log-in">
                <a href="{{ route('welcome') }}">
                    <div class="logo">
                            <img src="{{ asset('images/logo2.png') }}" alt="deliveboo-logo">
                            <span>Deliveboo</span>
                    </div>
                </a>
                <div class="header-right">
                    <div class="toggle-menu"  @click="toggleMenu()">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="menu-mobile"> {{--:class="isActive ? 'active' : ''"> --}}
            <div class="nav-menu-mobile">
                <ul>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                    @else
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        <li>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Sign in</a>
                            @endif
                        </li>
                            @endauth
                        @endif
                    <li><a href="{{route('contacts')}}">Contatti</a></li>
                    <li>
                        @guest

                        @else
                            <div class="route-login-register">
                                <div class="logout">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
