@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="{{route('admin.products.create')}}" class="btn btn-primary my-3">Crea nuovo prodotto</a>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
    @endif
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
            @foreach ($restaurants as $restaurant)
            @if ($product->restaurant_id == $restaurant->id)
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
            @endif
            @endforeach
            @endforeach
        </tbody>
    </table>
    {{-- PER LA VISUALIZZAZIONE DEL PAGINATE --}}
    {{-- {{$products->links()}} --}}
</div>
@endsection