<?php
@extends('layout.app')

@section('content')

    <div>
        <ul>
            <li><strong>idproduct</strong>{{ $product->get('product_id') }}</li>
        </ul>

    </div>

@endsection


