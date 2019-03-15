<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
use App\Model\Category;
class SubCategory extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
