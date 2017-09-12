<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\PaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\PaymentResource
     */
    public function index()
    {
        $company = request()->attributes->get('company');
        return PaymentResource::collection($company->payments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PaymentRequest  $request
     * @return \App\Http\Resources\PaymentResource
     */
    public function store(PaymentRequest $request)
    {
        $company = request()->attributes->get('company');
        $data = $company->payments()->save(new Payment(request()->only(array_keys($request->rules()))));
        return new PaymentResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \App\Http\Resources\PaymentResource
     */
    public function show(Payment $payment)
    {
        return new PaymentResource($payment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PaymentRequest  $request
     * @param  \App\Payment  $payment
     * @return \App\Http\Resources\PaymentResource
     */
    public function update(PaymentRequest $request, Payment $payment)
    {
        $data = tap($payment)->update(request()->only(array_keys($request->rules())));
        return new PaymentResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        if ($payment->delete()){
            return response()->json(["status" => ["Success"]], 200);
        }
        return response()->json(["error" => ["Something wont wrong"]], 500);
    }
}
