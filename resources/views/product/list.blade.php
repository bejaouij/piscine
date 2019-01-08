@extends('layouts.app')
@section('content')
    <div class="products-container row">
        @forelse($products as $product)
            <div class="product col s12">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s2">
                            <img src={{ asset('media') . '/' . $product->photo_path->photo_relative_path }} alt="" class="responsive-img"> <!-- notice the "circle" class -->
                        </div>

                        <div class="col s8">
                            <div class="black-text">
                                <P>{{ $product->product_name }}</P>

                                @if(empty($product->product_discount_percentage))
                                    <p>{{ number_format($product->product_price, 2, ',', ' ') }} &euro; TTC</p>
                                @else
                                    <p>
                                        <span class="initial-price">{{ number_format($product->product_price, 2, ',', ' ') }}</span> {{ number_format(((1 - $product->product_discount_percentage) * $product->product_price), 2, ',', ' ') }} &euro; TTC <span class="discount-percentage">{{ $product->product_discount_percentage * 100 }} %</span>
                                    </p>

                                @endif

                                <p><a class="waves-effect waves-light btn" href="{{ route('product', ['id' => $product->product_id ]) }}">Voir</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>
                Ce commerce n'a pas de produit en vente.
            </p>
        @endforelse
    </div>
@endsection