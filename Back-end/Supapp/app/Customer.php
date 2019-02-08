<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
  use SoftDeletes;

  public function updateCustomer($request)
  {
    if($request->name)
      $this->name = $request->name;
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
  public function destroyCustomer()
  {
    Customer::destroy($id);
  }
  public function listAllCustomer()
  {
    $list = App\Customer::all();
    return $list;
  }
  protected $dates = ['deleted_at'];
}
