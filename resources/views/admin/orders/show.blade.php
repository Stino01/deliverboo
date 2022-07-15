@extends('layouts.admin')
@include('partials/popupdelete')
@section('content')
<div class="container">
    <div class="card my-3 gap-3">
        <div class="card-header">
            <div class="container">
                <h1>Ordine numero: {{$order->id}}</h1>
                <h3>Effettuato da: {{$order->name}} {{$order->surname}}</h3>
                <h4>Prodotti:</h4>
                <ol>
                    @for($i=0;$i<$pivot_attr->count();$i++)
                        <li>{{$products[$i]->name}} - prezzo: {{$products[$i]->price}}&euro; - quantità:
                            {{$pivot_attr[$i]->pivot->quantity}}
                        </li>
                        @endfor
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection