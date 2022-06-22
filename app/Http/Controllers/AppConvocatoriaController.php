<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Convocatorias;
use Illuminate\Support\Facades\Http;

class AppConvocatoriaController extends Controller
{
    private $convocatorias;

    public function __construct(Convocatorias $convocatorias)
    {

        $this->convocatorias = $convocatorias; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convocatorias = $this->convocatorias->all();
        return view('appMobile.mostrarConvocatoria',compact('convocatorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $convocatoria = $this->convocatorias->find($id);
        return view('appMobile.editarConvocatoria',compact('convocatoria'));
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
            'link' => 'required',
        ]);
        $convocatoria = $this->convocatorias->update($id,$storeData);
        return redirect('convocatorias')->with('completado', 'La convocatoria han sido modificadas!');
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
    }
}
