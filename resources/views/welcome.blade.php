@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column is-2">
            <aside>
                <article class="panel is-info">
                    <p class="panel-heading is-size-6">
                        Category
                    </p>
                    
                    <a class="panel-block is-active">
                        bulma
                    </a>
                </article>      
            </aside>
        </div>

        <div class="column is-10">
            <div class="columns is-multiline">
                @for ($i = 0; $i < 12; $i++)
                    <div class="column is-2">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image" width="100px" height="100px">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Phasellus nec iaculis mauris.
                                    <a href="#" class="button is-rounded is-link is-small mt-3">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor    
            </div>
        </div>
    </div>
@endsection