<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Temas;
use Illuminate\Support\Facades\Http;

class AppTemaController extends Controller
{
    private $temas;
    private $id_material;

    public function __construct(Temas $temas)
    {

        $this->temas = $temas;
        $this->id_material = 0;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $value = $request->header('referer');
        $values = explode("/", $value);
        $id = $values[4];
        $temas = $this->temas->all($id);
        return view('appMobile.crearTema',compact('temas','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->input();
        $tema = $this->temas->create($storeData);
        return redirect('temas/'.$storeData['ID_material'])->with('completado', 'El Tema ha sido guardado!');
        //
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        $temas = $this->temas->all($id);
        return view('appMobile.mostrarTema',compact('temas','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tema = $this->temas->find($id);
        return view('appMobile.editarTema',compact('tema'));
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
        $storeData=$request->validate([
            'titulo' => 'required',
            'ID_material' => 'required',
            'link_notas' => 'required'
        ]);
        $tema = $this->temas->update($id,$storeData);
        return redirect('temas/'.$storeData['ID_material'])->with('completado', 'El tema ha sido modificado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $value = $request->header('referer');
        $values = explode("/", $value);
        $value = $values[4];
        $tema = $this->temas->remove($id);
        return redirect('temas/'.$value)->with('completado', 'El tema ha sido eliminado!');
    }
}
