@extends('layouts.admin')

@section('content')
<h1 class="text-center">Show</h1>
<div class="container d-flex align-items-center flex-column">
    <h1 class="text-center">{{$restaurant->name}}</h1>
    <p class="text-center">{{$restaurant->address}}</p>
    {{-- {{route('admin.products.index')}} --}}
    <h2>Prodotti disponibili</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome prodotto</th>
                <th scope="col">Nome Ristorante</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Data di creazione</th>
                <th scope="col">Modifica prodotto</th>
                <th scope="col">Elimina prodotto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td><a href="{{route('admin.products.show', $product->id)}}">{{$product->id}}</a></td>
                <td><a href="{{route('admin.products.show', $product->id)}}">{{$product->name}}</a></td>
                <td>{{$restaurant->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->created_at}}</td>
                <td><a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-warning">Modifica</a></td>
                <td>
                    <form action="{{route('admin.products.destroy', $product->id)}}" method="product">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="boolpress.openModal(event, {{ $product->id }})"
                            class="btn btn-danger delete">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{route('admin.restaurants.edit', $restaurant->id)}}" class="btn btn-primary text-uppercase my-5 col-2"
        type="button">Edit</a>
</div>
@endsection