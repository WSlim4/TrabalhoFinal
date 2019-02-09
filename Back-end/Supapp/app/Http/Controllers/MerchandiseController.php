<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merchandise;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lista = Merchandise::all();
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
      $merchandise = new Merchandise;
      $merchandise->updateMerchandise($request);

      return response()->json([$merchandise]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $showMerchandise = Merchandise::find($id);
      return response()->json([$showMerchandise]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $merchandise = Merchandise::findOrFail($id);
      $merchandise->updateMerchandise($request);

      return response()->json([$merchandise]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $merchandise = new Merchandise;
      $merchandise->destroyMerchandise($id);

      return response()->json(['DELETADO']);
    }
}
