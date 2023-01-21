<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public static function topLevelCategories()
    {
        return Category::where('parent_id', null)->get();
    }

    public function sortProducts($sortType, $orderByDesc)
    {
        $productCount = $this->productCount();

        if ($productCount > 5) {
            if (isset($sortType)) {
                $products = $orderByDesc
                    ? Product::where('category_id', $this->id)->orderByDesc($sortType)->paginate(5)
                    : Product::where('category_id', $this->id)->orderBy($sortType)->paginate(5);
            } else {
                $products = Product::where('category_id', $this->id)->paginate(5);
            }
        } else {
            if (isset($sortType)) {
                $products = $orderByDesc
                    ? $this->products->orderByDesc($sortType)
                    : $this->products->orderBy($sortType);
            } else {
                $products = $this->products;
            }
        }

        return $products;
    }

    public function productCount()
    {
        return count($this->products);
    }
}
