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

  public function merchandise()
  {
    return $this->belongsToMany('App\Merchandise');
  }

  public function updateCustomer($request)
  {
    if($request->name)
      $this->name = $request->name;
    if($request->cnpj)
      $this->cnpj = $request->cnpj;
    if($request->address)
      $this->address = $request->address;
    if($request->phone)
      $this->phone = $request->phone;
    if($request->email)
      $this->email = $request->email;
    if($request->user_id)
      $this->user_id = $request->user_id;

      $this->save();
  }

  public function destroyCustomer($id)
  {
    Customer::destroy($id);
  }

  protected $dates = ['deleted_at'];
}
