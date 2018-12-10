@extends('layouts.app')

@section('content')
<div class="container">
	@forelse($itemSummaries as $itemSummary)
		<div class="cart-item">
			<h2>{{ $itemSummary['cart_product']->product_name }}</h2>
			<p>Version: {{ $itemSummary['cart_copy']->copy_name }}</p>
			<div>
				<button class="cart-quantity" onclick="if(this.nextSibling.value > 0) this.nextSibling.value -= 1;">-</button><input class="cart-quantity" value="{{ $itemSummary['cart_quantity'] }}"><button class="cart-quantity" onclick="this.previousSibling.value += 1;">+</button>
			</div>
		</div>
	@empty
		Your cart is empty.
	@endforelse
</div>
@endsection