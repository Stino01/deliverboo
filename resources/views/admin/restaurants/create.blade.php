@extends('layouts.admin')

@section('content')
<div class="container text-white">
    <h1 class="text-center">Aggiungi il tuo ristorante</h1>
    <form method="POST" action="{{route('admin.restaurants.store')}}" enctype="multipart/form-data">
        @csrf

        {{-- NAME --}}
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        {{-- ADDRESS --}}
        <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                    name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        {{-- IVA --}}
        <div class="form-group row">
            <label for="vat_number" class="col-md-4 col-form-label text-md-right">{{ __('vat_number') }}</label>

            <div class="col-md-6">
                <input id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror"
                    name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number" autofocus>

                @error('vat_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        {{-- IMAGE --}}
        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right">Add image</label>

            <div class="col-md-6">
                <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}">
            </div>
        </div>

        {{-- CHECKBOX --}}
        <div class="form-group d-flex justify-content-center align-items-center form-check-inline">
            @foreach ($types as $type)
                <label for="types[]" class="col-form-label mx-3">{{$type->name}}</label>
                <div><input id="type" type="checkbox" name="types[]" class="form-check-input" value="{{$type->id}}"></div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary btn1">Submit</button>
    </form>
</div>
@endsection

<style>
    main .container {
        display: flex;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;
    }

    .btn1 {
        position: relative;
        left: 50%;
        transform: translateX(-50%) !important;
    }
</style>