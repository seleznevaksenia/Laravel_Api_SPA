<?php

namespace App\Http\Resources;

use App\Company;
use Illuminate\Http\Resources\Json\Resource;

class OrderItemResource extends Resource
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
            'product_id' => $this->product_id,
            'description' => $this->description,
            'qtu' => $this->qtu,
            'date' => (string)$this->created_at
        ];
    }
}
