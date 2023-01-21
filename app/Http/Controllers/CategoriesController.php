<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::topLevelCategories();

        return view('categories.index', ['categories' => $categories]);
    }

    public function show(Category $category, $sort = null)
    {
        $subcategories = Category::where('parent_id', $category->id)->get();

        $sortType = null;
        $orderByDesc = false;
        if (isset($sort)) {
            $explode = explode('-', $sort);

            $sortType = $explode[0];
            if ($explode[1] === 'desc') {
                $orderByDesc = true;
            }
        }

        $products = $category->sortProducts($sortType, $orderByDesc);

        return view('categories.show', [
            'category' => $category,
            'categories' => $subcategories,
            'products' => $products,
            'productCount' => $category->productCount()
        ]);
    }
}
