<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'image' => $this->image,
            'description' => $this->detail,
            'price' => $this->price,
            'discount' => $this->discount,
            'stock' => $this->stock < 1 ? 'Out of Stock':$this->stock,
            'rating' => $this->review->count() > 0 ? round($this->review->sum('star')/$this->review->count(),1) : 'No rating Yet',
            'href' => [
                'reviews' =>route('reviews.index',$this->id)
            ]
        ];
    }
}
