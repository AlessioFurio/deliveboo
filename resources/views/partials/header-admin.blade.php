<header :class="isActive ? 'active' : ''">

    <div class="wp-header">
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

                    {{-- <div v-cloak class="cart">
                        <div class="wp-image-cart" @click="showCart = !showCart">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="total-quantity"></span>
                            <div v-cloak v-if="showCart" class="cart-dropdown">
                                <ul class="cart-dropdown-list">
                                    <h3>Carrello</h3>
                                    <li v-for="product in cartCookie" :key="product.id">@{{ product.name }} (@{{ product.quantity }})</li>
                                    <li id="no-border">Prezzo totale: <span>@{{Math.round(totalPrice * 100)/100}} €</span></li>
                                    <a href="{{ route('payments.index') }}">Paga ora</a>
                                </ul>
                            </div>
                        </div>
                    </div> --}}

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
                    <li><a href="#">Contatti</a></li>
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
