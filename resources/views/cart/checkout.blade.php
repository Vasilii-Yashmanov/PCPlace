@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="/css/checkout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="custom-container">
        <h1>Заказ:</h1>

        <div>
            <p>Номер заказа: {{ $order->id }}</p>
            <p>Имя: {{ $order->name }}</p>
            <p>Номер телефона: {{ $order->phone }}</p>
            <p>Email: {{ $order->email }}</p>
            <p>Общая стоимость: {{ $order->total_price }} Руб.</p>
        </div>

        <h1>Товары:</h1>
        <ul>
            @foreach ($order->orderItems as $item)
                <li>
                    <p>Товар: {{ $item->product->name }}</p>
                    <p>Цена: {{ $item->product->price }} Руб.</p>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="contacts text-center">
                    <h5>Наши контакты</h5>
                    <p>Телефон: +1 234 567 89 10</p>
                    <p>Электронная почта: info@pc_place.com</p>
                    <p>Адрес: Петропавловская ул., 71, Пермь</p>
                </div>
            </div>
            <div class="col-md-12">
                <p class="map text-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1777.3511037548058!2d56.227637264866296!3d58.01088782608773!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1685351682319!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </p>
            </div>
        </div>
    </div> 
@endsection