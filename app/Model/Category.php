<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\SubCategory;
class Category extends Model
{

    public function subCategory(){
        return $this->hasMany(SubCategory::class);
    }
}
