@extends('layouts.app')

@push('styles')
    <style>
        .card {
             height: 100%; 
             display: flex; 
             flex-direction: column;
        } 

        .card-content {
            margin-bottom: auto
        }

        .card-footer {
            margin-top: auto
        }
    </style>
@endpush

@section('content')
    <div class="columns">
        <div class="column is-2">
           @include('frontend.components._sidebar')
        </div>

        <div class="column is-10">
            <div class="columns is-multiline">
                @foreach ($products as $product)
                    @include('frontend.components._product', $product)
                @endforeach    
            </div>

            {{ $products->render('paginations.bulma') }}
        </div>
    </div>
@endsection