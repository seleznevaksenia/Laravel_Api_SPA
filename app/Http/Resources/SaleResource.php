<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SaleResource extends Resource
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
            'date' => $this->date,
            'ttn' => $this->ttn,
            'cost' => $this->cost,
            'price' => $this->price,
            'payed' => $this->payed,
            'description' => $this->description,
            'sale_items' => $this->saleItems,
        ];
    }
}
