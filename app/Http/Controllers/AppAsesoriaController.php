<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Asesorias;
use Illuminate\Support\Facades\Http;


class AppAsesoriaController extends Controller
{
    private $asesorias;

    public function __construct(Asesorias $asesorias)
    {

        $this->asesorias = $asesorias; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asesorias = $this->asesorias->all();
        return view('appMobile.mostrarAsesoria',compact('asesorias'));
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
        
        $asesoria = $this->asesorias->find($id);
        return view('appMobile.editarAsesoria',compact('asesoria'));
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
        $asesoria = $this->asesorias->update($id,$storeData);
        return redirect('asesorias')->with('completado', 'Las asesorías han sido modificadas!');
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
