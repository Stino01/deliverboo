@extends('layouts.admin')

@section('content')
<h1 class="text-center">Index</h1>
<div class="container d-flex">
    @foreach ($restaurants as $restaurant)
    <div class="container d-flex align-items-center flex-column">
        <img src="https://media-assets.lacucinaitaliana.it/photos/61fb0393f9bff304ce3ec288/16:9/w_2560%2Cc_limit/Il-meglio-del-lago-di-Orta.jpg"
            alt="user" style="width: 300px">
        <h1 class="text-center">{{$restaurant->name}}</h1>
        {{-- <p class="text-center">{{$user->address}}</p> --}}
        <a href="{{route('admin.restaurants.show', $restaurant->id)}}" class="btn btn-primary text-uppercase my-5 col-2"
            type="button">Visualizza</a>
        <form action="{{route('admin.restaurants.destroy', $restaurant->id)}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger text-uppercase col-12" value="Delete">
        </form>
    </div>
    @endforeach
</div>
@endsection