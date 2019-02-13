<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Supplier extends Model
{
  use SoftDeletes;

  public function merchandise()
  {
    return $this->hasMany('App\Merchandise');
  }

  public function supplierUser()
  {
    return $this->belongsTo('App\User');
  }

  public function getCategory()
  {
    $category = Merchandise::find($id);
    return $category->category;
  }

  public function updateSupplier($request)
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
      
      $this->save();
  }
  public function destroySupplier($id)
  {
    Supplier::destroy($id);
  }

  protected $dates = ['deleted_at'];
}
