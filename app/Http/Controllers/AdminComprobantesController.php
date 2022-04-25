<?php

namespace App\Http\Controllers;
use App\Models\Comprobante;
use Illuminate\Http\Request;

class AdminComprobantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = 0;
        $comprobantes = Comprobante::all()->where('metodo_pago','depositoBBVA');
        return view('admin.comprobantes.index',['total'=>$total,'comprobantes'=>$comprobantes]);
    }

     public function comprobanteappbbva()
    {
        $total = 0;

        $comprobantes = Comprobante::all()->where('metodo_pago','appBBVA');
        return view('admin.comprobantes.appbbva',['total'=>$total,'comprobantes'=>$comprobantes]);
    }

    public function comprobanteotrobanco()
    {
        $total = 0;

        $comprobantes = Comprobante::all()->where('metodo_pago','otroBanco');
        return view('admin.comprobantes.otrobanco',['total'=>$total,'comprobantes'=>$comprobantes]);
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
        //
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
        //
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
