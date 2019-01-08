@extends('layouts.app')
@section('content')

    <table>
        <thead>
        <tr>
            <th>Nom du produit</th>
            <th>Version du produit</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Prix total</th>
            <th></th>
        </tr>
        </thead>

        <tbody>

        @foreach($itemSummaries as $itemSummary)
            <tr>
                <td>{{ $itemSummary['cart_product']->product_name }}</td>
                <td>{{ $itemSummary['cart_copy']->copy_name }}</td>
                <td>{{ $itemSummary["cart_product"]->getDiscountedPrice() }} EUR TTC</td>
                <th>{{ $itemSummary['cart_quantity'] }}</th>
                <td>{{ $itemSummary["cart_sumn"] }} EUR TTC</td>
                <td><a href="{{ route("cart-delete", ["id" => $itemSummary['cart_copy']->copy_id]) }}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a></td>
            </tr>
        @endforeach
        <tr>
            <th></th>
            <th></th>
            <th>Somme</th>
            <th>{{ $sum }}</th>
        </tr>
        </tbody>
    </table>

@endsection