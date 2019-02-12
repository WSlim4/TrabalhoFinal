<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
  use SoftDeletes;

  public function customerUser()
  {
    return $this->belongsTo('App\User');
  }

  public function manyMerchandise()
  {
    return $this->belongsToMany('App\Merchandise');
  }

  public function updateCustomer($request)
  {
    if($request->name_customer)
      $this->name_customer = $request->name_customer;
    if($request->cnpj_customer)
      $this->cnpj_customer = $request->cnpj_customer;
    if($request->adress_customer)
      $this->adress_customer = $request->adress_customer;
    if($request->phone_customer)
      $this->phone_customer = $request->phone_customer;
    if($request->email)
      $this->email = $request->email;
    if($request->id_pic_customer)
      $this->id_pic_customer = $request->id_pic_customer;

      $this->save();
  }

  public function destroyCustomer($id)
  {
    Customer::destroy($id);
  }

  protected $dates = ['deleted_at'];
}
