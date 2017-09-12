<?php

namespace App\Http\Middleware\App;

use App\Company;
use Closure;

class CheckCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('company_id')) {
            $company = Company::find(session('company_id'));
            $request->attributes->add(['company' => $company]);
            return $next($request);
        }
        return response()->json(["error" => ["Access denied"]], 401);
    }
}
