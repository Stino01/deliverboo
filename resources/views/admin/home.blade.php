@extends('layouts.admin')

@section('content')
<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php 
                $c = 0;
            ?>
            @foreach ($restaurants as $restaurant)
                @if ($restaurant->user_id == $user->id)
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <p class="text-center">{{ __('You are logged in!') }}</p>
                        </div>
                    </div>
                @else
                    <?php 
                        $c = $c + 1;
                    ?>
                    @if ($c == count($restaurants))
                        <div class="card">
                            <div class="card-header">{{ __('Aggiungi Ristorante') }}</div>
        
                            <div class="card-body">
                                <a href="{{route('admin.restaurants.create')}}" class="btn btn-primary text-uppercase my-3" type="button">Aggiungi Ristorante</a>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection

<style>
    .card-body a {
        position: relative;
        left: 50%;
        transform: translateX(-50%) !important;
    }
</style>