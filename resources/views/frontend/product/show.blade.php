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
            <a href="/" class="button is-danger is-rounded">Kembali</a>
            <p class="is-size-2 mb-3">{{ $product->name }}</p>
            <div class="columns">
                <div class="column is-4">
                    <img src="{{ $product->getImage() }}" alt="Belum Ada Foto" width="350px" height="350px">
                </div>

                <div class="column is-8">
                    <p class="is-size-4">{{ $product->description }}</p>
                    <p class="has-text-danger">{{ $product->getPrice() }}</p>

                    <a href="" class="button is-link is-rounded mt-5">Add to Cart</a>
                </div>
            </div>
            
        </div>
    </div>
@endsection