<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;
use App\Models\Comprobante;


class FichasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = 0;
        $fichas = Ficha::all();
        $comprobantes = Comprobante::all();
        return view('admin.fichas.index', ['fichas'=>$fichas, 'total'=>$total, 'comprobantes'=>$comprobantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $ficha = new Ficha();
        $ficha->file_ficha = $request->file_ficha;
        $ficha->monto = $request->monto;
         $ficha->save();
        return redirect()->back()->with('success','Ficha creada existosamente');
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
         $ficha=Ficha::findOrFail($id);
        return view('admin.fichas.edit', compact('ficha'));
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
        $ficha = Ficha::findOrFail($id);
        $ficha->file_ficha = $request->file_ficha;
        $ficha->monto = $request->monto;
        $ficha->update();

        return redirect()->back()->with('success', 'Información actualizada exitosamente');
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
