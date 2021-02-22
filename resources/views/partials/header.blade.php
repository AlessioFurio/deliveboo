<header>

    <div class="wp-header">
        <div class="filter"></div>

        <div class="header-log-in">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{route('admin.home')}}">Dashboard</a>

                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="header-top">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('images/logo.png') }}" alt="deliveboo-logo">
                </a>
            </div>

            <div class="nav-menu-top">

                <div class="cart">
                    <div class="wp-image-cart" @click="showCart = !showCart">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="total-quantity"></span>
                        <div v-if="showCart" class="cart-dropdown">
                            <ul class="cart-dropdown-list">
                                <h3>Carrello</h3>
                                <li v-for="product in cart" :key="product.id">@{{ product.name }} (@{{ product.quantity }})</li>
                                <li>Prezzo totale: @{{totalPrice}} €</li>
                                <a href="{{ route('payments.index') }}">Paga ora</a>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="toggle-menu"  @click="toggleMenu()">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>



        <div class="menu-mobile" :class="isActive ? 'active' : ''">
            <div class="nav-menu-mobile">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Ristoranti</a></li>
                    <li><a href="">Categorie</a></li>
                    <li><a href="">Piatti</a></li>
                    <li><a href="">Contatti</a></li>
                </ul>
            </div>
        </div>

        <div class="header-bottom">

        </div>

        <div class="text-header">
            <h2 class="principal-text">Non si può pensare bene, amare bene, dormire bene, se non si è mangiato bene.</h2>
        </div>


    </div>
</header>
