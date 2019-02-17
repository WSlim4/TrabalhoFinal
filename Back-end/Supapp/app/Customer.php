<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
  use SoftDeletes;
  use Notifiable;

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
    $newUser = new User;
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

    if (!Storage::exists('customerPhotos'))
               Storage::makeDirectory('customerPhotos',0775,true);

    $file = $request->file('id_pic');

    $filename = 'foto.' . $file->getClientOriginalExtension();

    $validator = Validator::make($request->all(),[
      'id_pic' => 'required|file|image|mimes:jpeg,jpg,png|max:2048'
    ]);

    if ($validator->fails()){
          return response()->json(['erro' => $validator->errors()], 400);
    }

    $path = $file->storeAs('customerPhotos', $filename);

    $this->id_pic = $path;

    $this->save();

  }

  public function destroyCustomer($id)
  {
    Customer::destroy($id);
  }

  protected $dates = ['deleted_at'];
}
