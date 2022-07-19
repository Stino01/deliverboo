@extends('layouts.admin')
@include('partials/popupdelete')
@section('content')
<div class="container">
    {{-- <a href="{{route('admin.restaurants.create')}}" class="btn btn-primary text-uppercase my-3"
        type="button">Aggiungi
        un ristorante</a> --}}
    @foreach ($restaurants as $restaurant)
    @if($restaurant->user_id == $user)
    <div class="container d-flex">
        <div class="container d-flex align-items-center flex-column">
            <h1 class="text-center ">{{$restaurant->name}}</h1>
            @if ($restaurant->image)
                <img class="resturant-image" src="{{asset('storage/' . $restaurant->image)}}" alt="user">
            @else
                <img class="resturant-image" src="{{asset('media/img/mistery-resturant.png')}}" alt="user">
            @endif
            {{-- <p class="text-center">{{$user->address}}</p> --}}
            <a href="{{route('admin.restaurants.show', $restaurant->id)}}" class="btn btn_main text-uppercase my-3"
                type="button">Visualizza</a>
            <form action="{{route('admin.restaurants.destroy', $restaurant->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="boolpress.openModal(event, {{ $restaurant->id }})"
                    class="btn btn-danger delete text-uppercase">Elimina</button>
            </form>
        </div>
    </div>
    @endif
    @endforeach
</div>

@endsection

<style>
    .resturant-image{
        width: 60%;
        border-radius: 20px;
    }

</style>