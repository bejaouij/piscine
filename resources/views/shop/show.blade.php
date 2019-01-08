@extends('layouts.app')
@section('content')
    <div class="shop-information">
        <div class="header">
            <h2>{{$shop->shop_name}}</h2>
        </div>

        <hr>

        <div class="content">
            <p>
                <strong>Email : </strong>{{ $shop->shop_contact_mail }}<br>
                <strong>Tel : </strong>{{ $shop->shop_phone }}<br>
                <strong>Livraison possible : </strong>{{ ($shop->shop_is_delivery_possible === true) ? 'Oui' : 'Non' }}<br>
                <strong>Adresse : </strong>{{ $shop->address->address_street_number }} {{ $shop->address->address_street }} - {{ $shop->address->address_postal_code }} {{ $shop->address->address_city }}
            </p>
        </div>
    </div>

    <hr>

    <div class="products-container row">
        @forelse($shop->products as $product)
            <div class="product col s4">
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

    <hr>

    <ul class="pagination">
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="active"><a href="#!">1</a></li>
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
@endsection