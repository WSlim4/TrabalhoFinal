<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Merchandise;

class MerchandiseMiddleware
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
        $merchandise = Merchandise::find($request->id); 
        if ($merchandise->supplier_id==$supplier->id){
            return $next($request);
        }else{
            return response()->json(['Permission denied'], 401);
        }
    }
}
