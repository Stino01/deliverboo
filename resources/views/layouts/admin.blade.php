<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="{{asset('css/variables.css')}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Deliverboo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar_dark ">
                <a class="navbar-brand text-white text-uppercase ml-5" href="http://127.0.0.1:8000/">
                        <img
                        src="https://cdn.discordapp.com/attachments/941312490950766592/996354486467571802/TEq98Yg.png"
                        width="40"
                        height="40"
                        class="d-inline-block align-center"
                        alt="Deliverboo Logo"
                    />
                    <h4 class="d-inline-block align-center">
                        Deliverboo
                    </h4>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    {{-- aria-label="{{ __('Toggle navigation') }}" --}}
                    aria-label="Toggle navigation"
                    >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        @auth
                        <li class="nav-item">
                            <a class="nav-link text-white  {{Route::currentRouteName() == 'home' ? 'active' : ''}}"
                                href="{{ url('/') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{Route::currentRouteName() == 'admin.products.index' ? 'active' : ''}}"
                                href="{{ route('admin.products.index') }}">Prodotti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white  {{Route::currentRouteName() == 'admin.restaurants.index' ? 'active' : ''}}"
                                href="{{ route('admin.restaurants.index') }}">Ristorante</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white  {{Route::currentRouteName() == 'admin.orders.index' ? 'active' : ''}}"
                                href="{{ route('admin.orders.index') }}">Ordini</a>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="  nav-link text-white {{Route::currentRouteName() == 'admin.home' ? 'active' : ''}}"
                                href="{{ url('admin') }}">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" 
                            style="background-color:#005c53"
                            aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>

        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>

<style>



</style>