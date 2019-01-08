@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/productCss.css') }}">
@endsection

@section('content')

    <div class="product">
        <div class="product_img">
            <img class="materialboxed" src="{{ asset("media/" . $product->photo_path->photo_relative_path) }}">
        </div>
        <div class="product_info">
            <a href="{{-- route("category", ["id" => $product->category_id]) --}}"><h6
                        class="product_category">{{ $product->category->category_name }}</h6></a>
            <a href="{{ route("shop", ["id" => $product->shop_siret]) }}"><h6
                        class="product_shop">{{ $product->shop->shop_name }}</h6></a>
            <h3 class="product_name">{{ $product->product_name }}</h3>
            <h4 class="product_price">{{ $product->product_price }} EUR TTC</h4>
            <select style="display: flex; margin-bottom: 10px;">
                @foreach($product->copies as $copy)
                    <option value="{{ $copy->copy_id }}">{{ $copy->copy_name }}</option>
                @endforeach
            </select>
            <a id="add" class="waves-effect waves-light btn z-depth-3" onclick="event.preventDefault(); document.getElementById('add-cart-product').submit();">AJOUTER
                AU PANIER</a>

            <form id="add-cart-product" action="{{ route("car-add", ["id" => $product->copies->first()->copy_id]) }}">
                <h6 class="item5">Quantité :</h6>
                <input style="width: 100px;" type="number" class="item6" name="cart_quantity" min="1" value="1" id="qtt">
            </form>

            <div class="item7 ">
                <a class="waves-effect waves-light btn z-depth-3">COMMANDER</a>
            </div>
        </div>
    </div>
    <div class="product_description">
        <a id="compare" class="waves-effect waves-light btn z-depth-3">Comparer avec un autre produit</a>
        <h4 class="item8">Description :</h4>
        <p class="item9">{{ $product->product_description }}</p>
    </div>

    <script>


        var instance;
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.materialboxed');
            var instances = M.Materialbox.init(elems);

            var elem = document.querySelector('#modal_compare');
            instance = M.Modal.init(elem);

            fetch("{{ route('compare_list', ["id" => $product->product_id ]) }}", {
                method: "POST"
            }).then(function (response) {
                return response.text()
            }).then(function (text) {
                document.getElementsByClassName('modal-content')[0].innerHTML += text;
            })

        });

        document.getElementById('compare').onclick = function () {
            instance.open()
        }
    </script>

    <div id="modal_compare" class="modal">
        <div class="modal-content">
            <h4>Choisir le produit à comparer</h4>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Annuler</a>
        </div>
    </div>




@endsection

