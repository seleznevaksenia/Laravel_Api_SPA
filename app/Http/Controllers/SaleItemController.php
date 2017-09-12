<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleItemRequest;
use App\Http\Resources\SaleItemResource;
use App\Http\Resources\SaleResource;
use App\Sale;
use App\SaleItem;


class SaleItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Sale $sale
     * @return \App\Http\Resources\SaleItemResource
     */
    public function index(Sale $sale)
    {
        return SaleItemResource::collection($sale->saleItems()->paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaleItemRequest $request
     * @param  \App\Sale $sale
     * @return array with sale_item and sale
     */
    public function store(SaleItemRequest $request, Sale $sale)
    {
        $sale_item = $sale->saleItems()->save(new SaleItem(request()->only(array_keys($request->rules()))));
        $sale->update([
            'cost' => round($sale->price + ($sale_item->cost * $sale_item->qtu), 2),
            'price' => round($sale->price + ($sale_item->price * $sale_item->qtu), 2)
        ]);
        $data = [
            'sale_item' => new SaleItemResource($sale_item),
            'sale' => new SaleResource($sale_item)
        ];
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale $sale
     * @param  \App\SaleItem $saleItem
     * @return \App\Http\Resources\SaleItemResource
     */
    public function show(Sale $sale, SaleItem $saleItem)
    {
        return new SaleItemResource($saleItem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SaleItemRequest $request
     * @param  \App\Sale $sale
     * @param  \App\SaleItem $saleItem
     * @return array with sale_item and sale
     */
    public function update(SaleItemRequest $request, Sale $sale, SaleItem $saleItem)
    {
        $sale_item = tap($saleItem)->update(new SaleItem(request()->only(array_keys($request->rules()))));
        $sale = tap($sale)->update([
            'cost' => round($sale->price + ($sale_item->cost * $sale_item->qtu), 2),
            'price' => round($sale->price + ($sale_item->price * $sale_item->qtu), 2)
        ]);
        $data = [
            'sale_item' => new SaleItemResource($sale_item),
            'sale' => new SaleResource($sale)
        ];
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale $sale
     * @param  \App\SaleItem $saleItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale, SaleItem $saleItem)
    {
        $sale_item = $saleItem;
        if ($saleItem->delete()) {
            $sale = tap($sale)->update([
                'cost' => round($sale->price - ($sale_item->cost * $sale_item->qtu), 2),
                'price' => round($sale->price - ($sale_item->price * $sale_item->qtu), 2)
            ]);
            return response()->json([
                "status" => ["Success"],
                'sale' => new SaleResource($sale)
            ], 200);
        }
        return response()->json(["error" => ["Something wont wrong"]], 500);
    }
}
