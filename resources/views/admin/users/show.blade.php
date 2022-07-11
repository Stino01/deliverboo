@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Show</h1>
    <div class="container">
        <h1 class="text-center">{{$user->name}}</h1>
        <p class="text-center">{{$user->address}}</p>
        <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary text-uppercase my-5" type="button">Edit</a>
    </div>
@endsection