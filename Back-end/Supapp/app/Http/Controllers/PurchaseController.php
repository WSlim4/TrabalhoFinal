<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;
use Auth;
use App\Notifications\SupplierNotification;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        if($user->customer){
            $lista = Purchase::where('customer_id',$user->customer->id)->get();
            return response()->json([$lista]);
        }else{
            $supplier = $user->supplier;
            $merchandises = $supplier->merchandises;
            $lista = [];
            foreach ($merchandises as $merchandise) {
                array_push($lista, $merchandise->purchases);
            }
            return response()->json($lista);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $purchase = new Purchase;
        $purchase->createPurchase($request);
        $merchandise = $purchase->merchandise;
        $supplier = $merchandise->supplier;
        $supplier->notify(new SupplierNotification($request->id));
        return response()->json([$purchase]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $showPurchase = Purchase::find($id);
        return response()->json([$showPurchase]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
        $purchase = Purchase::find($id);
        $purchase->destroyPurchase($id);

        return response()->json(['DELETADO']);
    }
}
