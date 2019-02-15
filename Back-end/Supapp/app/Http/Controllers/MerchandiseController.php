<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merchandise;
use App\Http\Requests\MerchandiseRequest;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*Categorias*/

     public function listCarnes(){
       $carne = new Merchandise;
       $carne->getCarne();
       return response()->json([$carne]);
     }
     public function listFrios(){
       $frio = new Merchandise;
       $frio->getFrio();
       return response()->json([$frio]);
     }
     public function listHortalicas(){
       $hortalica = new Merchandise;
       $hortalica->getHortalica();
       return response()->json([$hortalica]);
     }

     public function listLaticinios(){
       $laticinio = new Merchandise;
       $laticinio->getLaticinio();
       return response()->json([$laticinio]);
     }

/*CRUD*/
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
    public function store(MerchandiseRequest $request)
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
    public function update(MerchandiseRequest $request, $id)
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
