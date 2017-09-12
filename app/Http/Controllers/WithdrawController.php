<?php

namespace App\Http\Controllers;

use App\Http\Requests\WithdrawRequest;
use App\Http\Requests\WithwrawRequest;
use App\Http\Resources\WithdrawResource;
use App\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\WithdrawResource
     */
    public function index()
    {
        $company = request()->attributes->get('company');
        return WithdrawResource::collection($company->withdraws);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WithdrawRequest  $request
     * @return \App\Http\Resources\WithdrawResource
     */
    public function store(WithdrawRequest $request)
    {
        $company = request()->attributes->get('company');
        $data = $company->wathdraws()->save(new Withdraw(request()->only(array_keys($request->rules()))));
        return new WithdrawResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Withdraw  $withdraw
     * @return \App\Http\Resources\WithdrawResource
     */
    public function show(Withdraw $withdraw)
    {
        return new WithdrawResource($withdraw);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WithdrawRequest  $request
     * @param  \App\Withdraw  $withdraw
     * @return \App\Http\Resources\WithdrawResource
     */
    public function update(WithdrawRequest $request, Withdraw $withdraw)
    {
        $data = tap($withdraw)->update(request()->only(array_keys($request->rules())));
        return new WithdrawResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdraw $withdraw)
    {
        if ($withdraw->delete()){
            return response()->json(["status" => ["Success"]], 200);
        }
        return response()->json(["error" => ["Something wont wrong"]], 500);
    }
}
