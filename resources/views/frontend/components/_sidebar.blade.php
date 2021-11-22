<aside>
    <article class="panel is-info">
        <p class="panel-heading is-size-6">
            Category
        </p>
        
        @foreach ($categories as $category)
            <div class="panel-block is-justify-content-space-between">
                <p class="is-pulled-left">
                    <a href="{{ route('front.product.by.category', $category) }}">
                        {{ $category->name }}
                    </a>
                </p>   
                
                <p class="is-pulled-right tag is-info">{{ $category->products->count() }}</p>
            </div>
        @endforeach
    </article>      
</aside>