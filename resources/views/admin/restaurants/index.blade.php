@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Restaurant Index</h1>
    <div class="container d-flex flex-wrap">
        @foreach ($restaurants as $restaurant)
        <div class="container d-flex align-items-center flex-column">
            <img src="https://media-assets.lacucinaitaliana.it/photos/61fb0393f9bff304ce3ec288/16:9/w_2560%2Cc_limit/Il-meglio-del-lago-di-Orta.jpg" alt="user" style="width: 300px">
            <h1 class="text-center">{{$restaurant->name}}</h1>
            <p class="text-center">{{$restaurant->address}}</p>
            <a href="{{route('admin.products.index')}}" class="btn btn-primary text-uppercase my-5 col-2" type="button">Prodotti</a>
        </div>
        @endforeach
    </div>
@endsection