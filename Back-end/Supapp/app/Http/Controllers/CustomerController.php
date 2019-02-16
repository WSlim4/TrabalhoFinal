<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


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
      $customer = new Customer;
      $customer->updateCustomer($request);

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

      $customer->id_pic = $path;

      $customer->save();

      return response()->json([$customer]);
    }
    public function downloadPhoto($id){

        $customer = Customer::findOrFail($id);

        return response()->download(storage_path('app\\' .$customer->id_pic));
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
