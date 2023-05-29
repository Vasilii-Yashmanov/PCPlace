<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    //Тест домашней страницы
    public function test_home_page()
    {
        //Проверяем основную страницу
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    //тест страницы категории laptops
    public function test_category()
    {
        // Генерируем данные для создания категории
        $categoryData = [
            'name' => 'Видеокарты',
            'alias' => 'videocard',
            'img' => '/img/videocard.jpg'
        ];
        
        //Создание категории
        Category::create($categoryData);
        //Проверяем основную страницу
        $response = $this->get('/category/videocard');
        $response->assertStatus(200);
    }

    //тест страницы категории product
    public function test_item()
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

        $response = $this->get(route('product.show', ['alias' => $category->alias, 'product' => $product->id]));
        $response->assertStatus(200);
    }

    //Тест страницы Корзины
    public function test_cart()
    {
        //Проверяем основную страницу
        $response = $this->get('/cart');
        $response->assertStatus(200);
    }
}
