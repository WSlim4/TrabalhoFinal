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

  public function customer()
  {
    return $this->belongsToMany('App\Customer');
  }

  public function updateMerchandise($request)
  {
    if($request->name)
      $this->name = $request->name;
    if($request->measure)
      $this->measure = $request->measure;
    if($request->category)
      $this->category = $request->category;
    if($request->price)
      $this->price = $request->price;

      $this->save();
  }

  public function destroyMerchandise($id)
  {
    Merchandise::destroy($id);
  }

  protected $dates = ['deleted_at'];
}
