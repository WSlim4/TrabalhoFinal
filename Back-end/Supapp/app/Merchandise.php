<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merchandise extends Model
{
  use SoftDeletes;

  public function supplier()
  {
    return $this->belongsTo('App\Supplier');
  }
/*Categorias*/
  public function getCarne(){
    $carne = Merchandise::where('category','carne')->get();
    echo $carne;
  }
  public function getFrio(){
    $frio = Merchandise::where('category','frios')->get();
    echo $frio;
  }
  public function getHortalica(){
    $hortalica = Merchandise::where('category','hortalica')->get();
    echo $hortalica;
  }
  public function getLaticinio(){
    $laticinio = Merchandise::where('category','laticinio')->get();
    echo $laticinio;
  }

/*Relationship*/
  public function customer()
  {
    return $this->belongsToMany('App\Customer');
  }

/*CRUD*/
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
    if($request->supplier_id)
      $this->supplier_id = $request->supplier_id;

      $this->save();
  }

  public function destroyMerchandise($id)
  {
    Merchandise::destroy($id);
  }

  protected $dates = ['deleted_at'];
}
