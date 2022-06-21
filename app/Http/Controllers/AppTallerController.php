<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Talleres;
use Illuminate\Support\Facades\Http;

class AppTallerController extends Controller
{

    private $talleres;

    public function __construct(Talleres $talleres)
    {

        $this->talleres = $talleres;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talleres = $this->talleres->all();
        return view('appMobile.appProteco',compact('talleres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $talleres = $this->talleres->all();
        return view('appMobile.crearTaller',compact('talleres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $storeData=$request->validate([
            'ID' => 'required|numeric',
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'link' => 'required'
        ]);
        $taller = $this->talleres->create($storeData);
        return redirect('talleres')->with('completado', 'El taller ha sido guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $taller = $this->talleres->find($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taller = $this->talleres->find($id);
        return view('appMobile.editarTaller',compact('taller'));
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
            'fecha' => 'required',
            'link' => 'required'
        ]);
        $taller = $this->talleres->update($id,$storeData);
        return redirect('talleres')->with('completado', 'El taller ha sido modificado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $taller = $this->talleres->remove($id);
        return redirect('talleres')->with('completado', 'El taller ha sido eliminado!');
    }
}
