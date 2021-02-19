<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>


    </head>
    <body>

        <div id="root">
            @include('partials.header')

            @yield('content')

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
                                <i class="fas fa-shopping-cart"></i>
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
                        <h2 class="principal-text">
                            Non si può pensare bene, amare bene, dormire bene, se non si è mangiato bene.
                        </h2>
                    </div>


                </div>
            </header>
            {{-- @include('partials.footer') --}}
        </div>





        <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    </body>
</html>
