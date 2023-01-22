<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $sortType = $request->sortType;

        $orderByDesc = false;
        if (isset($sortType)) {
            $explode = explode('-', $sortType);

            $sortType = $explode[0];
            if ($explode[1] === 'desc') {
                $orderByDesc = true;
            }
        }

        $products = Product::where('name', 'like', '%' . $search . '%')->get();
        $productCount = count($products);

        if ($productCount > 5) {
            if (isset($sortType)) {
                $products = $orderByDesc
                    ? Product::where('name', 'like', '%' . $search . '%')->orderByDesc($sortType)->paginate(5)
                    : Product::where('name', 'like', '%' . $search . '%')->orderBy($sortType)->paginate(5);
            } else {
                $products = Product::where('name', 'like', '%' . $search . '%')->paginate(5);
            }
        } else {
            if (isset($sortType)) {
                $products = $orderByDesc
                    ? $products->sortByDesc($sortType)
                    : $products->sortBy($sortType);
            }
        }

        return view('products.search', [
            'products' => $products,
            'search' => $search,
            'productCount' => $productCount,
            'sortType' => $request->sortType
        ]);
    }
}
