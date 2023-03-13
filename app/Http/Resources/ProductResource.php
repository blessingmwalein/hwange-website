<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'isOnPromotion' => $this->isOnPromotion,
            'category' => $this->category,
            'colors'=> $this->colors,
            'prices' => $this->prices,
            'specifiations' => $this->specifications,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
