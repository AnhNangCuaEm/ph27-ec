@extends('layouts.base')

@section('content')
    <h2>商品一覧</h2>

    <ul>
        @foreach ($products as $product)
            <li>
                <a href="{{ route('products.show', ['id' => $product->id]) }}">
                    {{ $product->name }}
                </a>
                {{ $product->price }} 円
            </li>
        @endforeach
    </ul>
    <h2>セール商品一覧</h2>
    <ul>
        @foreach ($saleProducts as $saleProduct)
            <li>
                <a href="{{ route('products.show', ['id' => $saleProduct->id]) }}">
                    {{ $saleProduct->name }}
                </a>
                {{ $saleProduct->price }} 円
            </li>
        @endforeach
    </ul>
@endsection
