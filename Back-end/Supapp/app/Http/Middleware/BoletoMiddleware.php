<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;
use App\Purchase;

class BoletoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $purchase = Purchase::find($request->id);
        $customer = $purchase->customer;
        if($customer->user_id == Auth::user()->id)
        {
            return $next($request);
        }else
        {
            return response()->json(['Permission denied'], 401);     
        }
    }
}
