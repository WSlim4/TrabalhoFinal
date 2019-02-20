<?php

namespace App\Http\Middleware;

use Closure;
use App\Merchandise;
use Auth;


class PurchaseMiddleware
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
        $merchandise = Merchandise::find($request->id);
        $user = Auth::user();
        $supplier_m= $merchandise->supplier;
        $supplier_logado = $user->supplier;
        if($supplier_logado->id == $supplier_m->id)
        {
            return $next($request);
        }else{
            return response()->json(['Permission denied'], 401);
          }
        }
}
