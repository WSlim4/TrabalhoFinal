<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(SupplierRequest $request)
    {
      $supplier = new Supplier;
      $supplier->updateSupplier($request);

      return response()->json([$supplier]);
    }
    public function supPhoto($id){

        $supplier = Supplier::findOrFail($id);

        return response()->download(storage_path('app\\' .$supplier->id_pic));
      }

      return response()->json([$supplier]);
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
