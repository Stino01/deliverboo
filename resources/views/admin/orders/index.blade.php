@extends('layouts.admin')
@include('partials/popupdelete')
@section('content')
<div class="container">
    <h1>Lista degli ordini ricevuti</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefono</th>
                <th scope="col">Prezzo totale</th>
                <th scope="col">Indirizzo di fatturazione</th>
                <th scope="col">Indirizzo di spedizione</th>
                <th scope="col">Spedito</th>
                <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filteredOrders as $order)
            <tr>
                <td><a href="{{route('admin.orders.show', $order->id)}}">{{$order->id}}</a></td>
                <td>{{$order->name}}</td>
                <td>{{$order->surname}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->phone_number}}</td>
                <td>{{$order->total_price}}</td>
                <td>{{$order->billing_address}}</td>
                <td>{{$order->shipping_address}}</td>
                <td>{{$order->shipped}}</td>
                <td>{{$order->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection