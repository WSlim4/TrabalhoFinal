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

/*Subcategorias carnes*/

     public function listFrangos(){
       $frango = new Merchandise;
       $frango->getFrangos();
       return response()->json([$frango]);
     }
     public function listSuinos(){
       $suino = new Merchandise;
       $suino->getSuinos();
       return response()->json([$suino]);
     }
     public function listBovinos(){
       $bovino = new Merchandise;
       $bovino->getBovinos();
       return response()->json([$bovino]);
     }
     public function listPeixes(){
       $peixe = new Merchandise;
       $peixe->getPeixes();
       return response()->json([$peixe]);
     }

/*Subcategorias hortifrut*/

     public function listFrutas(){
       $fruta = new Merchandise;
       $fruta->getFrutas();
       return response()->json([$fruta]);
     }
     public function listHortalicas(){
       $hortalica = new Merchandise;
       $hortalica->getHortalicas();
       return response()->json([$hortalica]);
     }

/*Subcategoria laticinios*/
      public function listLeites(){
        $leite = new Merchandise;
        $leite->getLeites();
        return response()->json([$leite]);
      }
      public function listMargarinas(){
        $margarina = new Merchandise;
        $margarina->getMargarinas();
        return response()->json([$margarina]);
      }
      public function listQueijos(){
        $queijo = new Merchandise;
        $queijo->getQueijos();
        return response()->json([$queijo]);
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
