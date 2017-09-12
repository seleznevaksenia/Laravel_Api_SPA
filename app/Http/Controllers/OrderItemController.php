<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderItemRequest;
use App\Http\Resources\OrderItemResource;
use App\Order;
use App\OrderItem;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \App\Order  $order
     * @return \App\Http\Resources\OrderItemResource
     */
    public function index(Order $order)
    {
        return OrderItemResource::collection($order->orderItems()->paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderItemRequest  $request
     * @param  \App\Order  $order
     * @return \App\Http\Resources\OrderItemResource
     */
    public function store(OrderItemRequest $request, Order $order)
    {
        $data = $order->orderItems()->save(new OrderItem(request()->only(array_keys($request->rules()))));
        return new OrderItemResource($data);
    }

    /**
     * Display the specified resource.
     * @param  \App\Order  $order
     * @param  \App\OrderItem  $orderItem
     * @return \App\Http\Resources\OrderItemResource
     */
    public function show(Order $order,OrderItem $orderItem)
    {
        return new OrderItemResource($orderItem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderItemRequest  $request
     * @param  \App\Order  $order
     * @param  \App\OrderItem  $orderItem
     * @return \App\Http\Resources\OrderItemResource
     */
    public function update(OrderItemRequest $request, Order $order, OrderItem $orderItem)
    {
        $data = tap($orderItem)->update(request()->only(array_keys($request->rules())));
        return new OrderItemResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, OrderItem $orderItem)
    {
        if ($orderItem->delete()){
            return response()->json(["status" => ["Success"]], 200);
        }
        return response()->json(["error" => ["Something wont wrong"]], 500);
    }
}
