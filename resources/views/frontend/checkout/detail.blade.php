@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="is-size-1 has-text-weight-bold has-text-centered" text-align="center">Order Detail</h1>
        <p class="has-text-centered is-size-5">This your order detail, please make a payment to this account below to confirm your order</p>

        
        <div class="columns is-centered">
            <div class="column is-10 mt-3 is-centered">
                @include('frontend.components._detailOrder', $order)
                
                <a href="/" class="button is-info is-medium">Back to Product</a>
                @if ($order->status != 'paid')
                    <a href="{{ route('order.konfirmasi', $order) }}" class="button is-success is-medium">Konfirmasi Transaction</a>
                @endif
            </div>
        </div>
    </div>
@endsection