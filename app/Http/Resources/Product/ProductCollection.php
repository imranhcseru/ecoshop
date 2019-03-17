<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sub_category' => $this->subCategory->name,
            'name' => $this->name,
            'price' => $this->price,
            'discount' => $this->discount,
            'image' => $this->image,
            'totalPrice' => ceil($this->price - $this->price*$this->discount/100),
            'rating' => $this->review->count() > 0 ? round($this->review->sum('star')/$this->review->count(),1) : 'No rating Yet',
            'href' => [
                'detail' => route('products.show',$this->id)
            ]
        ];
    }
}
