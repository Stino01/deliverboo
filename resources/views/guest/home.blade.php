<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/vue-agile/dist/VueAgile.css">

    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <link rel="stylesheet" href="{{asset('css/variables.css')}}">

    <title>HomePage</title>
</head>

<body>
    <div id="auth-container">

        <header-component :user={{ Auth::id() }}></header-component>
        {{-- @dd(Auth::id()) --}}




        @if (Route::has('login'))
        <div>
            {{-- @auth
            <a type="button" class="btn btn_add" href="{{ url('/admin') }}">area personale</a>
            @else
            <a type="button" class="btn btn_add" href="{{ route('login') }}">accedi</a>

            @if (Route::has('register'))
            <a type="button" class="btn btn_add" href="{{ route('register') }}">registrati</a>
            @endif
            @endauth --}}
        </div>
        @endif
    </div>

    <div id="root"></div>

    <script src="{{asset('js/front.js')}}"></script>
    <script src="https://unpkg.com/vue-agile"></script>
</body>

</html>

<style>
    #auth-container {
        position: absolute;
        top: 0;
        right: 15%;
    }

    .btn_add {
        background-color: var(--QuaternaryColor);
        /* YELLOW */
        text-transform: uppercase;
        color: var(--SecondaryColor);
        /*BLUE MARINE */
        font-size: 15px;
        margin: 1.5rem .2rem;
    }

    .btn_add:hover {
        background-color: var(--SecondaryColor);
        /*BLUE MARINE */
        color: white;
    }
</style>