@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Show</h1>
    <div class="container d-flex align-items-center flex-column">
        <h1 class="text-center">{{$user->name}}</h1>
        <p class="text-center">{{$user->address}}</p>
        {{-- {{route('admin.products.index')}} --}}
        <a href="" class="btn btn-primary text-uppercase my-5 col-2" type="button">Prodotti</a>
        <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary text-uppercase my-5 col-2" type="button">Edit</a>
    </div>
@endsection