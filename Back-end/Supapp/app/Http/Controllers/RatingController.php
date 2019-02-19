<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Supplier;
use App\User;

class RatingController extends Controller
{
    public function showrating($id)
    {
        $supplier = Supplier::find($id);
        $customers = $supplier->customers;
        $array = [];
        foreach ($customers as $customer)
        {                                                                                                                   
          array_push($array,$customer->pivot->rating);
        }
        if(count($array) != 0)
        {
            $rate = array_sum($array)/count($array);
            return response()->json($rate); 
        }else
        {
            return response()->json('#');
        }
    }

    public function rate(Request $request)
    {
        $user = Auth::user();
        $customer = $user->customer;
        $customer->rateSupplier($request);
        return response()->json('Nota dada');
    }

}
