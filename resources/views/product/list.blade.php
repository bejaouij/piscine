@foreach($products as $product)
    <div class="card" style="width:200px">
        <div style="width: 200px; height: 200px;" class="card-image">
            <img src="{{ asset("media/" . $product->photo_path->photo_relative_path) }}">
            <span class="card-title">{{ $product->product_name }}</span>
        </div>
        <div class="card-content" style="padding: 15px">
            <p>{{ $product->product_price }} EUR TTC</p>
        </div>
        <div class="card-action">
            <a href="{{ route('product', ['id' => $product->product_id]) }}">Voir plus</a>
        </div>
    </div>

@endforeach