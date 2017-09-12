<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SaleItemResource extends Resource
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
            'qtu' => $this->qtu,
            'cost' => $this->cost,
            'date' => (string)$this->craated_at
        ];
    }
}
