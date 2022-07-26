@extends('layouts.admin')
@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="card">
        <h2 class="text-center my-3">Il tuo ordine è stato processato con successo!</h2>
        <h3 class="text-center my-3">Buon appetito!</h3>
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