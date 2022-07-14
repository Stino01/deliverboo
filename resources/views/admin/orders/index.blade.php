@extends('layouts.admin')
@include('partials/popupdelete')
@section('content')
<div class="container">

    <!-- Modal -->
    {{-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm order delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare il order con id: @{{itemId}} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" @@click="submitForm()">Conferma</button>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- Da cancellare in fase di produzione perchè l'ordine sarà fatto frontend dall'user --}}
    {{-- <a href="{{route('admin.orders.create')}}" class="btn btn-primary my-3">Effettua un ordine</a>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
    @endif --}}
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
            @foreach ($orders as $order)
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
                {{-- <td><a href="{{route('admin.orders.edit', $order->id)}}" class="btn btn-warning">Modifica</a></td> --}}
                {{-- <td>
                    <form action="{{route('admin.orders.destroy', $order->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="boolpress.openModal(event, {{ $order->id }})"
                            class="btn btn-danger delete">Delete</button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- PER LA VISUALIZZAZIONE DEL PAGINATE --}}
    {{-- {{$orders->links()}} --}}
</div>
@endsection