@extends('layouts.admin')
@include('partials/popupdelete')
@section('content')
<div class="container">
    <div class="card d-flex flex-column my-3 gap-3">
        <div class="card-header">
            <div class="container text-center">
                <h1>{{$order->name}}</h1>
                <h1>{{$order->surname}}</h1>
                @foreach ($products as $product)
                <p>{{$product->name}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>    
@endsection