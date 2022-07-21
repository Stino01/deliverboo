@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white">Completa l'ordine</div>

                <div class="card-body login-class">
                    <form method="POST" action="{{route('orders.store')}}">
                        @csrf

                        {{-- NOME --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right text-white">{{ __('Nome')
                                }}*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- COGNOME --}}
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right text-white">{{
                                __('Cognome')
                                }}*</label>

                            <div class="col-md-6">
                                <input id="surname" type="text"
                                    class="form-control @error('surname') is-invalid @enderror" name="surname" required
                                    autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- EMAIL --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-white">{{ __('Indirizzo
                                E-Mail')
                                }}*</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- NUMERO DI TELEFONO --}}
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right text-white">{{
                                __('Numero di telefono')
                                }}*</label>

                            <div class="col-md-6">
                                <input type="tel" id="phone_number" type="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required autocomplete="phone_number">

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- INDIRIZZO DI SPEDIZIONE --}}
                        <div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right text-white">{{
                                __('Indirizzo di spedizione')
                                }}*</label>

                            <div class="col-md-6">
                                <input type="text" id="shipping_address" type="shipping_address"
                                    class="form-control @error('shipping_address') is-invalid @enderror"
                                    name="shipping_address" required autocomplete="shipping_address">

                                @error('shipping_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- INDIRIZZO DI FATTURAZIONE --}}
                        <div class="form-group row">
                            <label for="billing_address" class="col-md-4 col-form-label text-md-right text-white">{{
                                __('Indirizzo di fatturazione')
                                }}*</label>

                            <div class="col-md-6">
                                <input type="text" id="billing_address" type="billing_address"
                                    class="form-control @error('billing_address') is-invalid @enderror"
                                    name="billing_address" required autocomplete="billing_address">

                                @error('billing_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-submit">
                                    {{ __('Completa il pagamento') }}
                                </button>
                                <span class="fst-italic text-white">(*) Campi obbligatori</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection