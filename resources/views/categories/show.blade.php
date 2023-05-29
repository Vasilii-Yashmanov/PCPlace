@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-6">
                    <a href="{{ route('products.show', $category->alias) }}" class="category-link">
                        <div class="category-card">
                            <h1 class="category-name">{{ $category->name }}</h1>
                            <img class="category-image" src="{{ $category->img }}" alt="{{ $category->name }}">
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection