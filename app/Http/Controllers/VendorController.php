<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRequest;
use App\Http\Resources\VendorResource;
use App\Vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\VendorResource
     */
    public function index()
    {
        return VendorResource::collection(auth()->user()->vendors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\VendorRequest $request
     * @return \App\Http\Resources\VendorResource
     */
    public function store(VendorRequest $request)
    {
        $data = auth()->user()->vendors()
            ->save(new Vendor(request()
                ->only(array_keys($request->rules()))));
        return new VendorResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor $vendor
     * @return \App\Http\Resources\VendorResource
     */
    public function show(Vendor $vendor)
    {
        return new VendorResource($vendor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\VendorRequest $request
     * @param  \App\Vendor $vendor
     * @return \App\Http\Resources\VendorResource
     */
    public function update(VendorRequest $request, Vendor $vendor)
    {
        $data = tap($vendor)->update(request()
            ->only(array_keys($request->rules())));
        return new VendorResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        if ($vendor->delete()){
            return response()->json(["status" => ["Success"]], 200);
        }
        return response()->json(["error" => ["Something wont wrong"]], 500);
    }
}
