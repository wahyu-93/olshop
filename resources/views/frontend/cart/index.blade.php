@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <h2 class="is-size-2">Shopping Carts</h2>

            @foreach ($carts as $cart)
                <div class="card">
                    <div class="card-header">
                        <p class="card-header-title">
                            {{ $cart['name'] }}
                        </p>
                    </div>
                    
                    <div class="card-content">
                        <div class="content">
                            <div class="columns">
                                <div class="column is-3">
                                    <img src="{{ $cart['image'] }}" alt="Foto Tidak Ada" class="image is-128x128">
                                </div>

                                <div class="column is-9">
                                    <p class="is-size-5">{{ $cart['description'] }}</p>
                                    <p class="is-size-3 has-text-danger">Rp. {{ number_format($cart['price'],0,',','.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection