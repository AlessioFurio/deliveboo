<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Deliveroo') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Media Query -->
         <meta name="viewport" content="width=device-width, initial-scale=1.0 ">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        @yield('chart-css')
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="header">
            <nav class="container-total">
                <div class="container-general-total">
                    <div class="container-brand-sx">
                        <div class="container-brand">
                            <a class="brand" href="{{ url('/') }}">
                                <img src="/images/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="container-login-register">
                        <div class="login-register">
                            @guest
                                <div class="route-login-register">
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                </div>
                                @if (Route::has('register'))
                                    <div class="route-login-register">
                                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </div>
                                @endif
                            @else
                                <div class="route-login-register">
                                    <div class="authentication">
                                        <a href="#">
                                            {{ Auth::user()->name }}
                                        </a>
                                    </div>
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
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <main>
          @yield('content')
        </main>
    </body>
</html>
