<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Purchase extends Model
{
    //
    public function customer(){
        return $this->belongsTo('App\Customer');

    }

    public function merchandise(){
        return $this->belongsto('App\Merchandise');
    }

    public function createPurchase($request){
        $user = Auth::user();
        $customer = $user->customer;
        $merchandise= Merchandise::find($request->id);
        $this->price_paid = ($request->amount_purchased) * ($merchandise->price);
        $this->amount_purchased = $request->amount_purchased;
        $this->customer_id = $customer->id;
        $this->merchandise_id = $merchandise->id;
        $this->save();
    }
}
