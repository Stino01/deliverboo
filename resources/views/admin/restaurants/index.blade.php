@extends('layouts.admin')

@section('content')
<h1 class="text-center">Index</h1>
@if($restaurant->user_id == null)
<a href="{{route('admin.restaurants.create')}}" class="btn btn-primary text-uppercase my-3 col-6" type="button">Aggiungi
    un ristorante</a>
@endif
<div class="container d-flex">
    <div class="container d-flex align-items-center flex-column">
        @if ($restaurant->image == null)
        <img src="https://cdn.discordapp.com/attachments/993428504194584577/996725473071607838/unknown.png" alt="user"
            style="width: 300px">
        @else
        <img src="{{ asset('storage/' . $restaurant->image)}}" alt="user" style="width: 300px">
        @endif
        <h1 class="text-center">{{$restaurant->name}}</h1>
        {{-- <p class="text-center">{{$user->address}}</p> --}}
        <a href="{{route('admin.restaurants.show', $restaurant->id)}}" class="btn btn-primary text-uppercase my-3 col-6"
            type="button">Visualizza</a>
        <form action="{{route('admin.restaurants.destroy', $restaurant->id)}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger text-uppercase col-12" value="Delete">
        </form>
    </div>
</div>
@endsection