<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use App\User;
use Illuminate\Notifications\Notifiable;

class Supplier extends Model
{
  use SoftDeletes;
  use Notifiable;

  public function merchandises()
  {
    return $this->hasMany('App\Merchandise');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function updateSupplier($request)
  {
    $newUser = new User;
    $user = Auth::user();
    $this->user_id = $user->id;
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

    if (!Storage::exists('supplierPhotos'))
                 Storage::makeDirectory('supplierPhotos',0775,true);

    $file = $request->file('id_pic');

    $filename = 'foto.' . $file->getClientOriginalExtension();

    $validator = Validator::make($request->all(),[
        'id_pic' => 'required|file|image|mimes:jpeg,jpg,png|max:2048'
    ]);

    if ($validator->fails()){
            return response()->json(['erro' => $validator->errors()], 400);
    }

    $path = $file->storeAs('supplierPhotos', $filename);

    $this->id_pic = $path;

    $this->save();

  }
  public function destroySupplier($id)
  {
    Supplier::destroy($id);
  }

  protected $dates = ['deleted_at'];
}
