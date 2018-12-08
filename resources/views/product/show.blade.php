
{{-- @extends('layout.app')
{{ $product->get('product_id') }}
--}}
        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Piscine</title>
</head>
<body>
{{ dump($product) }}
<br>
{{ $product->product_id }}
{{ $product->getDiscountedPrice() }}
</body>
</html>

@section('content')


    <div>
        <ul>
            <li><strong>idproduct</strong></li>
        </ul>

    </div>

@endsection


