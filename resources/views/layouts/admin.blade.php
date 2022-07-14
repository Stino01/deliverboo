<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header>
            <div class="container">
                <div id="top">
                    <div id="left">
                        <img src="https://cdn.discordapp.com/attachments/941312490950766592/996354486467571802/TEq98Yg.png">
                        <h1>deliverboo</h1>
                    </div>
                    <div id="right">
                        <div id="auth-container">
                            @if (Route::has('login'))
                                <div>
                                    @auth
                                        <a type="button" class="btn btn_add" href="{{ url('/admin') }}">area personale</a>           
                                    @else
                                        <a type="button" class="btn btn_add" href="{{ route('login') }}">accedi</a>
                    
                                        @if (Route::has('register'))
                                            <a type="button" class="btn btn_add" href="{{ route('register') }}">registrati</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>



<style>
    #auth-container{
        position: absolute;
        top: 0;
        right: 15%;
    }
    .btn_add{
        background-color: #BA5A31;
        text-transform: uppercase;
        color: white;
        font-size: 15px;
        margin-top: 5px
    }
    header{
        margin: 0 auto;
        background-color: #69DC9E;
    }
    #left{
        display: flex;
        flex-direction: row;
        align-items: center;
        vertical-align: middle;
    }
    h1{
        color: white;
        text-transform: uppercase;
        vertical-align: middle;
        margin: 0 !important;
    }
    #left img{
        width: 50px;
    }
    </style>