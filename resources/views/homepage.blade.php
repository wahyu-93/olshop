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
                    <div class="column is-2">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{{ $product->getImage() }}" alt="Foto Tidak Ada">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="content">
                                    <p class="is-size-6">
                                        <a href="{{ route('front.product.show',$product) }}">
                                            {{ $product->name }}
                                        </a>
                                    </p>
                                    <p class="has-text-danger">{{ $product->getPrice() }}</p>
                                </div>
                            </div>

                            <footer class="card-footer">
                                <a href="" class="card-footer-item button is-link is-small">Add to Cart</a>
                            </footer>
                        </div>
                    </div>
                @endforeach    
            </div>

            {{ $products->render('paginations.bulma') }}
        </div>
    </div>
@endsection