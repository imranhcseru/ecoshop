<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;
class Customer extends Model
{
    public function review(){
        return $this->hasMany(Review::class);
    }
}
