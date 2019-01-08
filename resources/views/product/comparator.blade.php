@extends('layouts.app')

@section('content')

    <table class="">
        <thead>
        <tr>
            <th>Nom</th>
            <th>{{ $product1->product_name }}</th>
            <th>{{ $product2->product_name }}</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <th>Magasin</th>
            <td><a href="{{ route("shop", ['id' => $product1->shop_siret]) }}">{{ $product1->shop->shop_name }}</a></td>
            <td><a href="{{ route("shop", ['id' => $product2->shop_siret]) }}">{{ $product2->shop->shop_name }}</a></td>
        </tr>
        <tr>
            <th>Image</th>
            <td><img class="materialboxed" style="width: 200px;" src="{{ asset("media/".$product1->photo_path->photo_relative_path) }}"></td>
            <td><img class="materialboxed" style="width: 200px;" src="{{ asset("media/".$product2->photo_path->photo_relative_path) }}"></td>
        </tr>
        <tr>
            <th>Prix</th>
            <td>{{ $product1->product_price }} EUR TTC</td>
            <td>{{ $product2->product_price }} EUR TTC</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $product1->product_description }}</td>
            <td>{{ $product2->product_description }}</td>
        </tr>
        <tr>
            <th></th>
            <td><a class="waves-effect waves-light btn z-depth-3" href="{{ route('product', ["id" => $product1->product_id]) }}">Voir plus</a></td>
            <td><a class="waves-effect waves-light btn z-depth-3" href="{{ route('product', ["id" => $product2->product_id]) }}">Voir plus</a></td>
        </tr>
        </tbody>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.materialboxed');
            var instances = M.Materialbox.init(elems);
        });
    </script>

@endsection