<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Http\Resources\SaleResource;
use App\Sale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\SaleResource
     */
    public function index()
    {
        $company = request()->attributes->get('company');
        return SaleResource::collection($company->sales);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaleRequest  $request
     * @return \App\Http\Resources\SaleResource
     */
    public function store(SaleRequest $request)
    {
        $company = request()->attributes->get('company');
        $data = $company->sales()->save(new Sale(request()->only(array_keys($request->rules()))));
        return new SaleResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \App\Http\Resources\SaleResource
     */
    public function show(Sale $sale)
    {
        return new SaleResource($sale);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SaleRequest  $request
     * @param  \App\Sale  $sale
     * @return \App\Http\Resources\SaleResource
     */
    public function update(SaleRequest $request, Sale $sale)
    {
        $data = tap($sale)->update(request()->only(array_keys($request->rules())));
        return new SaleResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale_copy = $sale;
        if ($sale->delete()){
            foreach($sale_copy->saleItems as $item){
                $item->delete();
            }
            return response()->json(["status" => ["Success"]], 200);
        }
        return response()->json(["error" => ["Something wont wrong"]], 500);
    }
}
