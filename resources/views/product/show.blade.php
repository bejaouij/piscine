{{-- Test --}}
<!--
        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produit : {{ $product->product_name }}</title>
</head>
<body>
{{ dump($product) }}
        <br>
{{ $product->product_id }}
        <br>
{{ $product->product_name }}
        <br>
{{ $product->getDiscountedPrice() }}
        <br>
{{ $product->shop->shop_name }}
        <br>
{{ $product->category->category_name }}
        <br>
{{ $product->photo_path->photo_relative_path  }}
        <br>
{{ dump($product->copies) }}
        <br>
{{ dump($product->reviews) }}
        </body>
        </html>
-->

@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/productCss.css') }}">
@endsection

@section('content')

    <div class="product">
        <img class="product_img materialboxed" src="{{ asset($product->photo_path->photo_relative_path) }}">
        <div class="product_info">
            <a href="{{ route("category", ["id" => $product->category_id]) }}"><h6
                        class="product_category">{{ $product->category->category_name }}</h6></a>
            <a href="{{ route("shop", ["id" => $product->shop_siret]) }}"><h6
                        class="product_shop">{{ $product->shop->shop_name }}</h6></a>
            <h3 class="product_name">{{ $product->product_name }}</h3>
            <h4 class="product_price">{{ $product->product_price }} EUR TTC</h4>
            <a class="waves-effect waves-light btn z-depth-3">AJOUTER AU PANIER</a>

            <h6 class="item5">Quantité :</h6>
            <input type="number" class="item6" name="quantity" min="1" value="1">
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
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.materialboxed');
            var instances = M.Materialbox.init(elems);

            var elem = document.querySelector('#modal_compare');
            instance = M.Modal.init(elem);

            fetch("{{ route('compare_list', ["id" => $product->category_id ]) }}", {
                method : "POST"
            }).then( function (response) {
                return response.text()
            }).then( function (text) {
                document.getElementsByClassName('modal-content')[0].innerHTML += text;
            })

        });

        document.getElementById('compare').onclick = function () {
            instance.open()
        }
    </script>

    <div id="modal_compare" class="modal">
        <div class="modal-content">
            <h4>Modal Header</h4>

        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Annuler</a>
        </div>
    </div>




@endsection

