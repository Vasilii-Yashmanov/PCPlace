<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryProductCreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Тест создания категории
    public function test_create_category()
    {
        // Генерируем данные для создания категории
        $categoryData = [
            'name' => 'Видеокарты',
            'alias' => 'videocard',
            'img' => '/img/videocard.jpg'
        ];
        
        //Создание категории
        Category::create($categoryData);

        // Проверка наличия категории в базе данных
        $this->assertDatabaseHas('categories', $categoryData);
    }

    //Тест создания продукта
    public function test_create_product()
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
            'name' => 'Gforce',
            'description' => 'Gforce',
            'price' => 20000,
            'img' => '/img/Gforce.jpg',
            'category_id' => $category->id
        ];
        Product::create($productData);

        // Проверка наличия продукта в базе данных
        $this->assertDatabaseHas('products', $productData);
    }
}
