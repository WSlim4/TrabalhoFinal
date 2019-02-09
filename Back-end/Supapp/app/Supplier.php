<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
  use SoftDeletes;

  public function updateSupplier($request)
  {
    if($request->name)
      $this->name = $request->name;
    if($request->cnpj_supplier)
      $this->cnpj_supplier = $request->cnpj_supplier;
    if($request->adress_supplier)
      $this->adress_supplier = $request->adress_supplier;
    if($request->phone_supplier)
      $this->phone_supplier = $request->phone_supplier;
    if($request->email)
      $this->email = $request->email;
    if($request->id_pic_supplier)
      $this->id_pic_supplier = $request->id_pic_supplier;
    if($request->rating)
      $this->rating = $request->rating;

      $this->save();
  }
  public function destroySupplier($id)
  {
    Supplier::destroy($id);
  }

  protected $dates = ['deleted_at'];
}
