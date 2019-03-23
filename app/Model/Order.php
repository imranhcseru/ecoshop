<?php

namespace App\Model;
use App\Model\Customer;
use App\Model\OrderProduct;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function product(){
        return $this->belongsToMany(OrderProduct::class);
    }

}
