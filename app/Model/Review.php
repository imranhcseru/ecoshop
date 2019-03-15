<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
use App\Model\Customer;
class Review extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    } 

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
