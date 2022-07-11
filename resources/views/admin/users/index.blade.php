@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Index</h1>
    <div class="container">
        @foreach ($users as $user)
        <a href="{{route('admin.users.show', $user->id)}}"><div class="card col-4 d-flex justify-content-center align-items-center p-5">
            <img src="https://media-assets.lacucinaitaliana.it/photos/61fb0393f9bff304ce3ec288/16:9/w_2560%2Cc_limit/Il-meglio-del-lago-di-Orta.jpg" alt="user" style="width: 300px">
            <h2>{{$user->name}}</h2>
            <p>{{$user->address}}</p>
        </div></a>
        @endforeach
    </div>
@endsection