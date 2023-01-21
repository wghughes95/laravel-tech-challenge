<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public static function topLevelCategories ()
    {
        return Category::where('parent_id', null)->get();
    }

    
}
