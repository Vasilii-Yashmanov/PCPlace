<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.show');

//Роут отображения страницы Категории к которой принадлежат товары
Route::get('/category/{alias}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
//Роут отображения одного товара
Route::get('/category/{alias}/{product}', [App\Http\Controllers\ProductController::class, 'showProduct'])->name('product.show');

//Корзина
Route::get('/cart', [App\Http\Controllers\CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{productId}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');

//Сохранение заказа
Route::post('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
//Отображение заказа 
Route::get('/cart/checkout/{orderId}', [App\Http\Controllers\CartController::class, 'showCheckout'])->name('cart.showCheckout');