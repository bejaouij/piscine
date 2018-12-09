@extends('layouts.app')

@section('content')
<div class="container">
	@forelse($cartItems as $cartItem)
		{{ $cartItem->customer_id }}
	@empty
		Your cart is empty.
	@endforelse
</div>
@endsection