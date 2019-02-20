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

  public function purchases()
  {
    return $this->hasMany('App\Purchase');
  }

  public function suppliers()
  {
    return $this->belongsToMany('App\Supplier')->withPivot('rating');
  }

  public function rateSupplier($request)
  {
    $this->suppliers()->attach($request->id,['rating' => $request->rate]);

  }

  public function updateCustomer($request, $user = null)
  {
    if($user)
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

    if (!Storage::exists('customerPhotos'))
               Storage::makeDirectory('customerPhotos',0775,true);

    if($request->id_pic){
    $file = $request->file('id_pic');

    $filename = 'foto.' . $file->getClientOriginalExtension();
    }
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
