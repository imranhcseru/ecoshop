<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;
use App\Model\Order;
class Customer extends Model
{
    public function review(){
        return $this->hasMany(Review::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
