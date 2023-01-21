<?php

namespace App\Http\Controllers;

use App\Product;
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

        if (isset($sort)) {
            $explode = explode('-', $sort);

            $sortType = $explode[0];
            $orderByDesc = false;
            if ($explode[1] === 'desc') {
                $orderByDesc = true;
            }
        }

        $productCount = count($category->products);
        if ($productCount > 5) {
            if (isset($sortType)) {
                $products = $orderByDesc
                    ? Product::where('category_id', $category->id)->orderByDesc($sortType)->paginate(5)
                    : Product::where('category_id', $category->id)->orderBy($sortType)->paginate(5);
            } else {
                $products = Product::where('category_id', $category->id)->paginate(5);
            }
        } else {
            if (isset($sortType)) {
                $products = $orderByDesc
                    ? $category->products->orderByDesc($sortType)
                    : $category->products->orderBy($sortType);
            } else {
                $products = $category->products;
            }
        }

        return view('categories.show', [
            'category' => $category,
            'categories' => $subcategories,
            'products' => $products,
            'productCount' => $productCount
        ]);
    }
}
