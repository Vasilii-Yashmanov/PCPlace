@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="/css/cards.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <h1 class="category">Категория: {{ $category->name }}</h1>
        
        <div class="row">
            @foreach ($category->products as $product)
            <div class="col-md-4">
                <div class="product-card">
                    <h2 class="product-name">{{ $product->name }}</h2>
                    <img class="product-image" src="{{ $product->img }}" alt="{{ $product->name }}">
                    <p class="product-price">{{ $product->price }} Руб.</p>
                    <a href="{{ route('product.show', ['alias' => $category->alias, 'product' => $product->id]) }}" class="product-button">Купить</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection