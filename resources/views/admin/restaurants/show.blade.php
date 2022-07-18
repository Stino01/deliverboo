@extends('layouts.admin')
@include('partials/popupdelete')
@section('content')
<div id="container-products">
    <div id="container-ristorante">
        <h1 class="text-center">{{$restaurant->name}}</h1>
        <a href="{{route('admin.products.create')}}" class="btn btn_main text-uppercase my-3" type="button">Aggiungi piatto</a>
        <img src="https://cdn.discordapp.com/attachments/993428504194584577/996725473071607838/unknown.png">
    </div>
    <div id="container-prodotti">
        @foreach ($products as $product)
        <div class="product-card">
            <div class="left-side-card">
                <p><a href="{{route('admin.products.show', $product->id)}}">{{$product->name}}</a></p>
                <p>€ {{$product->price}}</p>
                <div class="left-side-under-card">
                    <form>
                        <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-warning text-uppercase">Modifica</a>
                    </form>
                    <form action="{{route('admin.products.destroy', $product->id)}}" method="post">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="boolpress.openModal(event, {{ $product->id }})" class="btn btn-danger delete text-uppercase">Elimina</button>
                    </form>
                </div>
            </div>
            <div class="right-side-card">
                <img src="{{$product->image}}">
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

<style>
    .product-card{
        height: 150px;
        width: 40%;
        border-radius: 10px;
        background-color: white;
        box-shadow: 0px 5px 14px 3px black;
        display: flex;
        flex-direction: row;
        align-items: center;
        margin-top: 2vw;

    }
    .prezzo-prodotto::before{
        content: "€ ";
    }
    .left-side-card{
        width: 60%;
        display: flex;
        flex-direction: column;
        align-items: center;

    }
    .left-side-under-card{
        display: flex;
        flex-direction: row;
        gap: 10px;
    }
    .right-side-card{
        width: 40%
    }
    .product-card img{
        border-radius: 10px;
        width: 90%;
        height: 80%;
        object-fit: cover;
    }

    #container-products{
        display: flex;
        flex-direction: row;
        justify-content: center;  
        width: 100%;
    }
    #container-ristorante{
        /* position: fixed;
        left: 0;
        top: auto; */
        padding: 0 2%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        width: 40%;
    }
    #container-ristorante img{
        width: 100%;
        border-radius: 10px;
        box-shadow: 0px 5px 14px 3px black;
    }
    #container-prodotti{
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: space-evenly;
        align-content: flex-start;
        width: 60%;
        height: 10000px;
    }

</style>