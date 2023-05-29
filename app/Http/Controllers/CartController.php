<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Контроллер корзины
 */

class CartController extends Controller
{
    /**
     * Добавляет продукт в корзину.
     *
     * @param  Request  $request
     * @param  int  $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToCart(Request $request, $productId)
    {
        // Получаем продукт по идентификатору
        $product = Product::findOrFail($productId);

        // Создаем новую запись в корзине с данным продуктом
        Cart::create([
            'product_id' => $product->id,
            'quantity' => 1, 
        ]);

        // Перенаправляем пользователя на страницу с содержимым корзины
        return redirect()->route('cart.view');
    }

    /**
     * Удаляет продукт из корзины.
     *
     * @param  Request  $request
     * @param  int  $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeFromCart(Request $request, $productId)
    {
        // Находим запись в корзине с данным продуктом
        $cartItem = Cart::where('product_id', $productId)->first();

        if ($cartItem) {
            // Удаляем запись из корзины
            $cartItem->delete();
        }

        // Перенаправляем пользователя на страницу с содержимым корзины
        return redirect()->route('cart.view');
    }

    /**
     * Просмотр содержимого корзины.
     *
     * @param  Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function viewCart(Request $request)
    {
        // Получаем все записи из корзины
        $cartItems = Cart::with('product')->get();

        // Рассчитываем общую стоимость товаров в корзине
        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price;
        });

        // Возвращаем представление с данными корзины
        return view('cart.view', compact('cartItems', 'totalPrice'));
    }

    public function checkout(Request $request)
    {
        // Валидация данных пользователя
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
    ]);

    // Создание нового заказа
    $order = Order::create([
        'user_id' => null,
        'total_price' => 0,
        'name' => $validatedData['name'],
        'phone' => $validatedData['phone'],
        'email' => $validatedData['email'],
    ]);

    // Получение записей из корзины для создания элементов заказа
    $cartItems = Cart::with('product')->get();

    // Создание элементов заказа и расчет общей стоимости заказа
    $totalPrice = 0;
    foreach ($cartItems as $cartItem) {
        $price = $cartItem->product->price;
        $quantity = $cartItem->quantity;
        $totalPrice += $price * $quantity;

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $cartItem->product->id,
            'quantity' => $quantity,
            'price' => $price,
        ]);
    }

    // Обновление общей стоимости заказа
    $order->update([
        'total_price' => $totalPrice,
    ]);

    // Очистка корзины после оформления заказа
    Cart::truncate();

    // Возвращаем представление с информацией о заказе
    return redirect()->route('cart.showCheckout', ['orderId' => $order->id]);
    }

    //Отображение заказа
    public function showCheckout($orderId)
    {
        $order = Order::with('orderItems.product')->findOrFail($orderId);

        return view('cart.checkout', compact('order'));
    }
}
