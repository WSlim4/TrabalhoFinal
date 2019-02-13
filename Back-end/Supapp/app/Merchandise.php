<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Supplier; 
use Auth;

class Merchandise extends Model
{
  use SoftDeletes;

  public function supplier()
  {
    return $this->belongsTo('App\Supplier');
  }

  public function manyCustomer()
  {
    return $this->belongsToMany('App\Customer');
  }

  public function updateMerchandise($request)
  {
    $user = Auth::user();
    $suplier = Supplier::where('user_id',$user->id)->first();
    if($request->name_mer)
      $this->name_mer = $request->name_mer;
    if($request->stock)
      $this->stock = $request->stock;
    if($request->mer_id)
      $this->mer_id = $request->mer_id;
    if($request->category)
      $this->category = $request->category;
    $this->supplier_id = $suplier->id;
    $this->save();
  }

  public function destroyMerchandise($id)
  {
    Merchandise::destroy($id);
  }

  protected $dates = ['deleted_at'];
}
