@extends('layouts.admin')
@include('partials/popupdelete')
@section('content')
<div class="container">

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm product delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare il product con id: @{{itemId}} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" @@click="submitForm()">Conferma</button>
                </div>
            </div>
        </div>
    </div>
    <a href="{{route('admin.products.create')}}" class="btn btn_main my-3">Crea nuovo prodotto</a>
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
                <td>{{$product->price}}</td>
                <td>{{$product->created_at}}</td>
                <td><a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-warning">Modifica</a></td>
                <td>
                    <form action="{{route('admin.products.destroy', $product->id)}}" method="POST">
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
    {{-- PER LA VISUALIZZAZIONE DEL PAGINATE --}}
    {{-- {{$products->links()}} --}}
</div>
@endsection