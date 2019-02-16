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
/*Subcategorias carnes*/
  public function getFrangos(){
    $frango = Merchandise::where('category','frango')->get();
    echo $frango;
  }
  public function getSuinos(){
    $suino = Merchandise::where('category', 'suino')->get();
    echo $suino;
  }
  public function getBovinos(){
    $bovino = Merchandise::where('category', 'bovino')->get();
    echo $bovino;
  }
  public function getPeixes(){
    $peixe = Merchandise::where('category', 'peixe')->get();
    echo $peixe;
  }

  /*Subcategorias derivados*/
  public function getQueijos(){
    $queijo = Merchandise::where('category', 'queijo')->get();
    echo $queijo;
  }
  public function getMargarinas(){
    $margarina = Merchandise::where('category', 'margarina')->get();
    echo $margarina;
  }
  public function getLeites(){
    $leite = Merchandise::where('category', 'leite');
    echo $leite;
  }

  /*Subcategoria hortifrut*/
  public function getFrutas(){
    $frutas = Merchandise::where('category', 'fruta')->get();
    echo $frutas;
  }
  public function getHortalicas(){
    $hortalica = Merchandise::where('category', 'hortalica')->get();
    echo $hortalica;
  }

/*Relationship*/
  public function customer()
  {
    return $this->belongsToMany('App\Customer');
  }

/*CRUD*/
  public function updateMerchandise($request)
  {
    $user = Auth::user();
    $supplier= $user->supplier;
    $this->supplier_id= $supplier->id;
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
