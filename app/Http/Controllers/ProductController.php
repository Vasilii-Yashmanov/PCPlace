<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Контроллер товара
 */

class ProductController extends Controller
{
    /**
     * Отображает страницу категории, к которой принадлежат товары.
     *
     * @param string $alias Псевдоним категории.
     * @return \Illuminate\Contracts\View\View
     */
    public function show($alias)
    {
        $category = Category::where('alias', $alias)->first();

        if (!$category) {
            // Обработка случая, когда категория не найдена
            abort(404);
        }

        return view('products.show', compact('category'));
    }

    /**
     * Отображает страницу товара в контексте категории.
     *
     * @param string $alias Псевдоним категории.
     * @param int $product Идентификатор товара.
     * @return \Illuminate\Contracts\View\View
     */
    public function showProduct($alias, $product)
    {
        // Находим категорию по ее псевдониму
    $category = Category::where('alias', $alias)->first();

    // Находим товар по его идентификатору и принадлежащий категории
    $product = $category->products()->find($product);

    if (!$product) {
        // Обработка случая, когда товар не найден в указанной категории
        abort(404);
    }

    return view('products.item', compact('category', 'product'));
    }
}
