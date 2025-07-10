@extends('layouts.base')

@section('content')
    <h2>{{ $product->name }}</h2>
    <div>
        {{ $product->price }}円
    </div>
    <form action="{{ route('cart.store') }}" method="post">
        @csrf
        @error('quantity')
            <p class="error">{{ $message }}</p>
        @enderror
        <input type="hidden" name="productId" value="{{ $product->id }}">
        <input type="number" name="quantity" class="@error('quantity') input-error @enderror"
            value="{{ old('quantity', 1) }}">個<br>
        <input type="submit" value="カートに入れる">
    </form>
@endsection
