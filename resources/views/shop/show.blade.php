{{-- Test --}}

        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Magasin : {{ $shop->shop_name }}</title>
</head>
<body>
{{ dump($shop) }}
<br>
{{ $shop->shop_siret }}
<br>
{{ $shop->shop_name }}
<br>
{{ $shop->shop_phone }}
<br>
{{ $shop->address }}
<br>
{{ dump($shop->products) }}
</body>
</html>

{{-- Fin test --}}

{{-- @extends('layout.app') --}}

@section('content')

    {{-- Affichage d'un magasin --}}

@endsection

{{-- Include de la view qui affiche les produits --}}

