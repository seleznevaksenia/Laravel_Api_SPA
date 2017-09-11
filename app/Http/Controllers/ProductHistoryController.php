<?php

namespace App\Http\Controllers;

use App\ProductHistory;
use Illuminate\Http\Request;

class ProductHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth()->user()->productsHistory;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  auth()->user()->productsHistory()->save(new ProductHistory(request()->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductHistory  $productHistory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductHistory $productHistory)
    {
        return $productHistory;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductHistory  $productHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductHistory $productHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductHistory  $productHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductHistory $productHistory)
    {
        return tap($productHistory)->update(request()->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductHistory  $productHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductHistory $productHistory)
    {
        return $productHistory->delete();
    }
}
