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

      if (Auth::user()->id===$request->id){
          return $next($request);
      }else{
          return response()->json(['Permission denied'], 401);
      }
    }
}
