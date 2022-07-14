<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/vue-agile/dist/VueAgile.css">

    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <title>HomePage</title>
</head>

<body>

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


    

    <div id="root"></div>

    <script src="{{asset('js/front.js')}}"></script>
    <script src="https://unpkg.com/vue-agile"></script>
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