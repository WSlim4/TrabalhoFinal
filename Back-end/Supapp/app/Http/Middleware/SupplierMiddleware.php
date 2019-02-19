<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;
use App\Supplier;

class SupplierMiddleware
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
        $user = Auth::user();
        $supplier = $user->supplier;
        if ($user->id==$supplier->user_id){
          return $next($request);
        }else{
          return response()->json(['Permission denied'], 401);
        }
    }
}
