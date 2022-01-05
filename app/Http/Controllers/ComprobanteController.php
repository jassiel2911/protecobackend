<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comprobante;
use App\Models\Ficha;
use App\Models\Ticket;


class ComprobanteController extends Controller
{
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
    public function create()
    {
        return view('comprobante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ficha = Ficha::all()->where('id',$request->ficha_id)->first();

        $comprobante = new Comprobante();
        $comprobante->fecha = $request->fecha;
        $comprobante->metodo_pago = $request->metodo_pago;
        $comprobante->banco = $request->banco;
        $comprobante->no_ficha = $request->no_ficha;
        $comprobante->ultimos_digitos = $request->ultimos_digitos;
        $comprobante->cie = $request->cie;
        $comprobante->monto = $ficha->monto;
        $comprobante->ficha_id = $request->ficha_id;

        $captura = $request->captura;
        $name=auth()->user()->fname.auth()->user()->lname."Comprobante".$request->ficha_id;
        $destination = public_path() . '/comprobantes/';
        $captura->move($destination, $name);
        $comprobante->captura=$name;

        $comprobante->save();

        $ticket_update = Ticket::all()->where('id', $ficha->ticket_id)->first();
        $ticket_update->status = "Pago recibido. Pendiente de aprobación";
        $ticket_update->save();

        // return $ficha;

        return redirect()->route('perfil.index')->with('success', 'Información enviada exitosamente');

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
