<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\CustomerNotification;
use App\Notifications\SupplierNotification;
use App\Supplier;
use App\Customer;
use App\Purchase;

class NotificationController extends Controller
{
    public function enviaBoleto($id)
    {
        $purchase = Purchase::find($id);
        $customer = $purchase->customer;
        $customer->notify(new CustomerNotification($customer)); 
        return redirect('/');
    }   
    
}
