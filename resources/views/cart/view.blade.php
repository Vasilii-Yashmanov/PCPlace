@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="/css/cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <h1 class="cart" style="font-size: 28px;">Корзина</h1>

        @if ($cartItems->isEmpty())
            <p style="text-align: center">Твоя корзину пуста</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Товар</th>
                        <th>Цена</th>
                        <th>Удаление</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cartItem)
                        <tr>
                            <td>{{ $cartItem->product->name }}</td>
                            <td>{{ $cartItem->product->price }} Руб.</td>
                            <td>
                                <form action="{{ route('cart.remove', $cartItem->product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="TotalPrice">Общая стоимость: {{ $totalPrice }} Руб.</p> <!-- Вывод общей стоимости -->
        @endif
    </div>
    <form action="{{ route('cart.checkout') }}" method="POST" class="checkout">
        @csrf
    
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="phone">Номер телефона</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
    
        <button type="submit" class="order">Сделать заказ</button>
    </form>
@endsection