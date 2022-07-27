@extends('layouts.admin')
@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="card">
        <h2 class="text-center my-4">Transazione fallita!</h2>
        <a href="/"><button class="btn btn-primary cent">Torna alla home</button></a>
    </div>
</div>
@endsection

<style>
.card {
    background-color: transparent !important;
    border: none !important;
}
.cent {
    position: relative;
    left: 50%;
    transform: translateX(-50%);
}
</style>