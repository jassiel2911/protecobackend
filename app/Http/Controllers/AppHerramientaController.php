<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Herramientas;
use Illuminate\Support\Facades\Http;

class AppHerramientaController extends Controller
{

    private $herramientas;

    public function __construct(Herramientas $herramientas)
    {

        $this->herramientas = $herramientas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $herramientas = $this->herramientas->all();
        return view('appMobile.mostrarHerramienta',compact('herramientas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $herramientas = $this->herramientas->all();
        return view('appMobile.crearHerramienta',compact('herramientas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData=$request->validate([
            'ID' => 'required|numeric',
            'titulo' => 'required',
            'descripcion' => 'required',
            'link_imagen' => 'required',
            'link_pagina' => 'required'
        ]);
        $herramienta = $this->herramientas->create($storeData);
        return redirect('herramientas')->with('completado', 'La herramienta ha sido guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $herramienta = $this->herramientas->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $herramienta = $this->herramientas->find($id);
        return view('appMobile.editarHerramienta',compact('herramienta'));
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
            'descripcion' => 'required',
            'link_imagen' => 'required',
            'link_pagina' => 'required'
        ]);
        $herramienta = $this->herramientas->update($id,$storeData);
        return redirect('herramientas')->with('completado', 'La herramienta ha sido modificada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $herramienta = $this->herramientas->remove($id);
        return redirect('herramientas')->with('completado', 'La herramienta ha sido eliminada!');
    }
}
