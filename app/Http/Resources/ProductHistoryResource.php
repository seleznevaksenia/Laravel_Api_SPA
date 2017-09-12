<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductHistoryResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cost' => $this->cost,
            'price' => $this->price,
            'description' => $this->description,
            'date' => (string)$this->craated_at
        ];
    }
}
