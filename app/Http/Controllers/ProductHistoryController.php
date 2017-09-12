<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductHistoryRequest;
use App\Http\Resources\ProductHistoryResource;
use App\ProductHistory;
use App\Vendor;
use Illuminate\Http\Request;

class ProductHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Vendor $vendor
     * @return \App\Http\Resources\ProductHistoryResource
     */
    public function index(Vendor $vendor)
    {
        return ProductHistoryResource::collection($vendor->productsHistory()->paginate(20));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductHistoryRequest  $request
     * @param  \App\Vendor $vendor
     * @return \App\Http\Resources\ProductHistoryResource
     */
    public function store(ProductHistoryRequest $request, Vendor $vendor)
    {
        $data = $vendor->productsHistory()->save(new ProductHistory(request()->only(array_keys($request->rules()))));
        return new ProductHistoryResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductHistory  $productHistory
     * @param  \App\Vendor $vendor
     * @return \App\Http\Resources\ProductHistoryResource
     */
    public function show(Vendor $vendor, ProductHistory $productHistory)
    {
        return new ProductHistoryResource($productHistory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductHistoryRequest  $request
     * @param  \App\Vendor $vendor
     * @param  \App\ProductHistory  $productHistory
     * @return \App\Http\Resources\ProductHistoryResource
     */
    public function update(ProductHistoryRequest $request, Vendor $vendor, ProductHistory $productHistory)
    {
        $data = tap($productHistory)->update(request()->only(array_keys($request->rules())));
        return new ProductHistoryResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductHistory  $productHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductHistory $productHistory)
    {
        if ($productHistory->delete()){
            return response()->json(["status" => ["Success"]], 200);
        }
        return response()->json(["error" => ["Something wont wrong"]], 500);
    }
}
