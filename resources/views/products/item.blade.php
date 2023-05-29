@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="/css/product.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="product-container">
            <div>
                <img class="product-image" src="{{ $product->img }}" alt="{{ $product->name }}">
            </div>
            <div class="product-info">
                <h1 class="product-name">{{ $product->name }}</h1>
                <p class="product-description">{{ $product->description }}</p>
                <p class="product-price">Цена: {{ $product->price }} Руб.</p>
                <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="product-button">Купить</button>
                </form>
            </div>
        </div>
    </div>
@endsection