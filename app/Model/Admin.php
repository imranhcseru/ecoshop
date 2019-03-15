<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
class Admin extends Model
{
    
    public function product(){
        return $this->hasMany(Product::class);
    }
}
