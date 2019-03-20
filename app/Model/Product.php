<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;
use App\Model\SubCategory;
use App\Model\Admin;
class Product extends Model
{
    protected $fillable = [
        'sub_category_id','name','detail','price','discount','stock','admin_id'
    ];
    public function review(){
        return $this->hasMany(Review::class);
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public static function getCartProduct($id){
        $verdict = Self::where('id',$id)->first();
        return $verdict;
    }
}
