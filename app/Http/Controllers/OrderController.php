<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\OrderResource
     */
    public function index()
    {
        $company = request()->attributes->get('company');
        return OrderResource::collection($company->orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @return \App\Http\Resources\OrderResource
     */
    public function store(OrderRequest $request)
    {
        $company = request()->attributes->get('company');
        $data = $company->orders()->save(new Order(request()->only(array_keys($request->rules()))));
        return new OrderResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \App\Http\Resources\OrderResource
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @param  \App\Order  $order
     * @return \App\Http\Resources\OrderResource
     */
    public function update(OrderRequest $request, Order $order)
    {
        $data = tap($order)->update(request()->only(array_keys($request->rules())));
        return new OrderResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order_copy = $order;
        if ($order->delete()){
            foreach($order_copy->orderItems as $item){
                $item->delete();
            }
            return response()->json(["status" => ["Success"]], 200);
        }
        return response()->json(["error" => ["Something wont wrong"]], 500);
    }
}
