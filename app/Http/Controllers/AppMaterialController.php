<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Materiales;
use Illuminate\Support\Facades\Http;

class AppMaterialController extends Controller
{
    private $materiales;

    public function __construct(Materiales $materiales)
    {

        $this->materiales = $materiales; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales = $this->materiales->all();
        return view('appMobile.mostrarMaterial',compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiales = $this->materiales->all();
        return view('appMobile.crearMaterial',compact('materiales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Arreglar el añadido de materiales
    public function store(Request $request)
    {
        $storeData=$request->validate([
            'ID' => 'required|numeric',
            'titulo' => 'required',
            'link_imagen' => 'required'
        ]);
        $material = $this->materiales->create($storeData);
        return redirect('materiales')->with('completado', 'El material ha sido guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $material = $this->materiales->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = $this->materiales->find($id);
        return view('appMobile.editarMaterial',compact('material'));
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
            'link_imagen' => 'required'
        ]);
        $material = $this->materiales->update($id,$storeData);
        return redirect('materiales')->with('completado', 'El material ha sido modificada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = $this->materiales->remove($id);
        return redirect('materiales')->with('completado', 'El material ha sido eliminado!');
    }
}
