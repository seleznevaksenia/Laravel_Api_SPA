<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\CompanyResource
     */
    public function index()
    {
        return CompanyResource::collection(auth()->user()->companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest $request
     * @return \App\Http\Resources\CompanyResource
     */
    public function store(CompanyRequest $request)
    {
        $data = auth()->user()->companies()
            ->save(new Company(request()
                ->only(array_keys($request->rules()))));
        return new CompanyResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company $company
     * @return \App\Http\Resources\CompanyResource
     */
    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest $request
     * @param  \App\Company $company
     * @return \App\Http\Resources\CompanyResource
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $data = tap($company)->update(request()
            ->only(array_keys($request->rules())));
        return new CompanyResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if ($company->delete()){
            return response()->json(["status" => ["Success"]], 200);
        }
        return response()->json(["error" => ["Something wont wrong"]], 500);
    }
}
