<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Контроллер категории
 */

class CategoryController extends Controller
{
    /**
     * Отображает основную страницу категорий.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.show', compact('categories'));
    }
}
