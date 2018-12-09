{{-- Test --}}

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
</body>
</html>

{{-- Fin test --}}

{{-- @extends('layout.app') --}}

@section('content')


    {{-- Affichage du produit --}}

@endsection


