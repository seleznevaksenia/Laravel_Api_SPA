<?php

namespace App\Http\Controllers;

use App\Company;
use App\Sale;
use App\SaleItem;
use Illuminate\Http\Request;

class SaleItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale = Sale::find(request('sale_id'));
        return $sale->saleItems;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale_item = SaleItem::create(request()->all());
        $sale = Sale::find(request('sale_id'));
        $sale->update([
            'cost' => round($sale_item->cost * $sale_item->qtu),
            'price' => round($sale_item->price * $sale_item->qtu)
        ]);
        return $sale_item;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SaleItem  $saleItem
     * @return \Illuminate\Http\Response
     */
    public function show(SaleItem $saleItem)
    {
        return $saleItem;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SaleItem  $saleItem
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleItem $saleItem)
    {
        $sale_item = tap($saleItem)->update(request()->all());
        $sale = Sale::find(request('sale_id'));
        $sale->update([
            'cost' => round($sale_item->cost * $sale_item->qtu),
            'price' => round($sale_item->price * $sale_item->qtu)
        ]);
        return $sale_item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SaleItem  $saleItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleItem $saleItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaleItem  $saleItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleItem $saleItem)
    {
        return $saleItem->delete();
    }
}
