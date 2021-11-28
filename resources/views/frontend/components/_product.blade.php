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
            <a href="{{ route('cart.add.item', $product) }}" class="card-footer-item button is-link is-small">Add to Cart</a>
        </footer>
    </div>
</div>