<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Customer extends Model
{
  use SoftDeletes;

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function merchandises()
  {
    return $this->belongsToMany('App\Merchandise');
  }

  public function updateCustomer($request)
  {
    
    if($request->cnpj)
      $this->cnpj = $request->cnpj;
    if($request->name)
      $this->name = $request->name;
    if($request->address)
      $this->address = $request->address;
    if($request->phone)
      $this->phone = $request->phone;
    if($request->email)
      $this->email = $request->email;
    $this->save();
  }

  public function destroyCustomer($id)
  {
    Customer::destroy($id);
  }

  protected $dates = ['deleted_at'];
}
