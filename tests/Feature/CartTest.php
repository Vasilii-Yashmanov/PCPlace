<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_add_to_cart()
    {
        // Создание категории
        $categoryData = [
            'name' => 'Видеокарты',
            'alias' => 'videocard',
            'img' => '/img/videocard.jpg'
        ];
        $category = Category::create($categoryData);

        // Создание продукта
        $productData = [
            'id' => '1',
            'name' => 'Gforce',
            'description' => 'Gforce',
            'price' => 20000,
            'img' => '/img/Gforce.jpg',
            'category_id' => $category->id
        ];
        $product = Product::create($productData);

        $response = $this->post('/cart/add/' . $product->id);

        $response->assertRedirect(route('cart.view'));

        $this->assertDatabaseHas('carts', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
    }

    public function test_remove_from_cart()
    {
        // Создание категории
        $categoryData = [
            'name' => 'Видеокарты',
            'alias' => 'videocard',
            'img' => '/img/videocard.jpg'
        ];
        $category = Category::create($categoryData);

        // Создание продукта
        $productData = [
            'id' => '1',
            'name' => 'Gforce',
            'description' => 'Gforce',
            'price' => 20000,
            'img' => '/img/Gforce.jpg',
            'category_id' => $category->id
        ];
        $product = Product::create($productData);

        // Добавление товара в корзину
        Cart::create([
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response = $this->post('/cart/remove/' . $product->id);

        $response->assertRedirect(route('cart.view'));

        $this->assertDatabaseMissing('carts', [
            'product_id' => $product->id,
        ]);
    }
}
