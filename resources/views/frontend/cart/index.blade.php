@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-8">
                @if ($carts)
                    {{-- <a href="/" class="button is-danger is-small is-rounded mb-3">Product List</a> --}}
                    <h2 class="is-size-2">Shopping Carts</h2>

                    @php
                        $totalItems = 0;
                        $totalPrice = 0;
                    @endphp

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
                                            <p class="is-size-4 has-text-danger">{{ formatRupiah($cart['price']) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                            $totalItems += $cart['qty'];
                            $totalPrice += $cart['price'];
                        @endphp


                    @endforeach
                @else 
                    <div class="card">
                        <div class="card-content">
                            <div class="content">
                                <h3 class="is-size-4">Oppps Empty Cart</h3>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="column is-4">
                <h2 class="is-size-2">Cart Detail</h2>
                <div class="card">
                    <div class="card-content">
                        <div class="content">
                            <p class="is-size-5">Jumlah Item : {{ $totalItems }} Items</p>
                            <p class="is-size-5">Total Price : {{ formatRupiah($totalPrice) }}</p>
                            <hr>
                            <a href="{{ route('checkout.index') }}" class="button is-danger is-small is-rounded is-fullwidth">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection