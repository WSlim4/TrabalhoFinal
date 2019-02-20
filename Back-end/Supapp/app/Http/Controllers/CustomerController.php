<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Notifications\CustomerNotification;
use Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $successStatus = 200;

    public function index()
    {
     $lista = Customer::all();
     return response()->json([$lista]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
      $validator = Validator::make($request -> all(), [
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required',
      'c_password' => 'required|same:password',
      ]);
      if ($validator -> fails()) {
          return response() -> json(['error' => $validator -> errors()], 401);
      }
      $newUser = new User;
      $newUser->name = $request->name;
      $newUser->email = $request->email;
      $newUser->password = bcrypt($request->password);
      $newUser->save();
      $success['name'] = $newUser->name;
      $success['token'] = $newUser->createToken('MyApp')->accessToken;
      $customer = new Customer;
      try {
        $customer->updateCustomer($request, $newUser);
        $customer->save();
      }finally{
        if(!($customer->id)){
          $newUser->delete();
        }
      }
      return response()->json(['success' => $success, 'Customer' => $customer],$this->successStatus);
    }

    public function putPhoto(Request $request){
        $photo = new Customer;

        if (!Storage::exists('customerPhotos'))
                 Storage::makeDirectory('customerPhotos',0775,true);

        if($request->id_pic){

            $file = $request->file('id_pic');
            $path = $file->store('customerPhotos');
            $this->id_pic = $path;
        }

        $validator = Validator::make($request->all(),[
          'id_pic' => 'file|image|mimes:jpeg,jpg,png|max:2048'
        ]);

       if ($validator->fails()){
              return response()->json(['erro' => $validator->errors()], 400);
        }
        return response()->json(['Upload feito com sucesso']);
    }

    public function pathPhoto($id){ //Acessa a pasta das fotos

        $customer = Customer::findOrFail($id);

        return response()->storage_path('app\\' .$customer->id_pic);
      }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $showCustomer = Customer::find($id);
      return response()->json([$showCustomer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {

      $customer = Customer::findOrFail($id);
      $customer->updateCustomer($request);

      return response()->json([$customer]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->destroyCustomer($id);

        return response()->json(['DELETADO']);
    }
}

// Essa é a rota
/*
Route::get('boleto/{id}','boleto@fazer');

public function fazer($id){
  $purchase = Purchase::find($id);
  $customer = $purchase->customer;
  $supplier = $purchase->supplier;

}

*/
