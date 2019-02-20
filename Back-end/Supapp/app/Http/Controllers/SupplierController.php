<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\User;
use App\Http\Requests\SupplierRequest;
use App\Notifications\SupplierNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $successStatus = 200;

    public function index()
    {
      $lista = Supplier::all();
      return response()->json([$lista]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
      dd($request);
      $validator = Validator::make($request -> all(), [
        'name' => 'required',
        'email' => 'required|email',
=======
      $validator = Validator::make($request -> all(), [//Essa função cria
        'name' => 'required',                          // um usuário junto com
        'email' => 'required|email',                  //  um supplier
>>>>>>> IntegracaoBianca
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
        $supplier = new Supplier;
        try {
          $supplier->updateSupplier($request, $newUser);
          $supplier->save();
        }finally{
          if(!($supplier->id)){
            $newUser->delete();
          }
        }
        return response()->json(['success' => $success, 'Supplier' => $supplier],$this->successStatus);
     }

     public function pathPhoto($id){

        $supplier = Supplier::findOrFail($id);

        return response()->storage_path('app\\' .$supplier->id_pic);
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showSupplier = Supplier::find($id);
        return response()->json([$showSupplier]);
    }

    public function putPhoto(Request $request){
        $photo = new Supplier;

        if (!Storage::exists('supplierPhotos'))
                 Storage::makeDirectory('supplierPhotos',0775,true);

        if($request->id_pic){

            $file = $request->file('id_pic');
            $path = $file->store('supplierPhotos');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, $id)
    {
      $supplier = Supplier::findOrFail($id);
      $supplier->updateSupplier($request);

      return response()->json([$supplier]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $supplier = new Supplier;
      $supplier->destroySupplier($id);
      return response()->json(['DELETADO']);
    }

}
