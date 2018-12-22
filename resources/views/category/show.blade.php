{{-- Test --}}

        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorie : {{ $category->category_name }}</title>
</head>
<body>
{{ dump($category) }}
<br>
{{ $category->category_id }}
<br>
{{ $category->category_name }}
<br>
{{ dump($category->products) }}
</body>
</html>

{{-- Fin test --}}

{{-- @extends('layout.app') --}}

@section('content')


    {{-- Affichage de la categorie --}}

@endsection

{{-- Affichage de la liste de produit associés à la categorie --}}


