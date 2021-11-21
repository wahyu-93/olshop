@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column is-2">
            <aside>
                <article class="panel is-info">
                    <p class="panel-heading is-size-6">
                        Category
                    </p>
                    
                    @foreach ($categories as $category)
                        <a class="panel-block is-active" href="">
                            {{ $category->name }}

                        </a>
                    @endforeach
                </article>      
            </aside>
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
                                    <p class="has-text-danger">Rp. {{ $product->getPrice() }}</p>
                                    <a href="#" class="button is-rounded is-link is-small mt-3">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach    
            </div>

            {{ $products->render('paginations.bulma') }}
        </div>
    </div>
@endsection