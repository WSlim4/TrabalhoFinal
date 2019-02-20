<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Supplier;

class RatingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // Para dar Merge
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $customer = $user->customer;
        $supplier = Supplier::find($request->id);
        if(!($supplier->customers->contains($customer->id)))
        {   
            return $next($request);
        }else 
        {
            return response()->json('Você Já avaliou esse Fornecedor!');    
        }
    }
}
