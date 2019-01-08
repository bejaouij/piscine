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

        @php $totalDiscountedValues = 0; @endphp

        @foreach($itemSummaries as $itemSummary)
            @php $totalDiscountedValues += $itemSummary["cart_product"]->getDiscountValue() * $itemSummary['cart_quantity'] @endphp
            <tr>
                <td>{{ $itemSummary['cart_product']->product_name }}</td>
                <td>{{ $itemSummary['cart_copy']->copy_name }}</td>
                <td>{{ number_format($itemSummary["cart_product"]->getDiscountedPrice() * $itemSummary['cart_quantity'], 2, ',', ' ') }} &euro; TTC</td>
                <th>{{ $itemSummary['cart_quantity'] }}</th>
                <td>{{ number_format($itemSummary["cart_sumn"], 2, ',', ' ') }} &euro; TTC</td>
                <td><a href="{{ route("cart-delete", ["id" => $itemSummary['cart_copy']->copy_id]) }}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a></td>
            </tr>
        @endforeach
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Totaux</th>
            <th>{{ number_format($sum, 2, ',', ' ') }} &euro; TTC</th>
        </tr>
        @if($totalDiscountedValues > 0)
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th style="font-weight: normal; color: lightgreen">Réduction</th>
                <th style="font-weight: normal; color: lightgreen">{{ number_format($totalDiscountedValues, 2, ',', ' ') }} &euro; TTC</th>
            </tr>

            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Total réduit</th>
                <th>{{ number_format($sum- $totalDiscountedValues, 2, ',', ' ') }} &euro; TTC</th>
            </tr>
        @endif
        </tbody>
    </table>

@endsection