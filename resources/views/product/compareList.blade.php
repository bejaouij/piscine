@if ($products->count() == 0)
    <h5>Aucun produit à comparer</h5>
@else
    @foreach($products as $product)
        <a href="{{ route('comparator', ['product_id_2' => $product->product_id, "product_id_1" => $product_id]) }}">
            <div class="card" style="width:200px">
                <div style="width: 200px; height: 200px;" class="card-image">
                    <img src="{{ asset("media/" . $product->photo_path->photo_relative_path) }}">
                    <span class="card-title">{{ $product->product_name }}</span>
                </div>
                <div class="card-content" style="padding: 15px">
                    <p>{{ $product->product_price }} EUR TTC</p>
                </div>
            </div>
        </a>
    @endforeach
@endif