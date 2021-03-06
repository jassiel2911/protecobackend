<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\TicketItem;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class BecariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all()->where('titular', auth()->user()->id);
        return view('becarios.index', compact('cursos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('becarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Curso();
        $curso->nombre = $request->nombre;
        $curso->fecha_inicio = $request->fecha_inicio;
        $curso->fecha_fin = $request->fecha_fin;
        $curso->dias = $request->dias;
        $curso->hora_inicio = $request->hora_inicio;
        $curso->hora_fin = $request->hora_fin;
        $curso->antecedentes = $request->antecedentes;
        $curso->equipo = $request->equipo;
        $curso->tipo = $request->tipo;
        $curso->cat = $request->cat;
        $curso->nivel = $request->nivel;
        $curso->cupo = $request->cupo;
        $curso->semestre = $request->semestre;
        $curso->titular = auth()->user()->id;
        $curso->turno = $request->turno;


        $curso->precio_unam = $request->precio_unam;
        $curso->precio_ext = $request->precio_ext;
        $curso->precio_gral = $request->precio_gral;

        $temario = $request->temario;
        $extTemario = $temario->getClientOriginalExtension(); // method returns extension.
        $nameTemario = "Temario_".$curso->nombre."_".$curso->semestre.".".$extTemario;
        $ruta = public_path().'/temarios';
        $temario->move($ruta, $nameTemario);
        $curso->temario=$nameTemario;

        $imagen = $request->imagen;
        $extImagen = $imagen->getClientOriginalExtension(); // method returns extension.
        $nameImagen = "Imagen".$curso->nombre.".".$extImagen;
        $rutaImagen = public_path().'/img/logos/';
        $imagen->move($rutaImagen, $nameImagen);
        $curso->imagen=$nameImagen;

        $curso->save();

        return redirect()->back()->with('success','El curso se ha creado existosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso=Curso::findOrFail($id);
        $ticket = Ticket::all();
        $ticket_items = TicketItem::where('curso_id',$id)->get();
        $i=0;

        return view('becarios.show', ['curso'=>$curso, 'ticket_items'=>$ticket_items, 'i'=>$i]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('becarios.edit', ['curso'=>$curso]);
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
        $curso = Curso::findOrFail($id);

        $curso->nombre = $request->nombre;
        $curso->fecha_inicio = $request->fecha_inicio;
        $curso->fecha_fin = $request->fecha_fin;
        $curso->dias = $request->dias;
        $curso->hora_inicio = $request->hora_inicio;
        $curso->hora_fin = $request->hora_fin;
        $curso->antecedentes = $request->antecedentes;
        $curso->equipo = $request->equipo;
        $curso->tipo = $request->tipo;
        $curso->cat = $request->cat;
        $curso->nivel = $request->nivel;
        $curso->cupo = $request->cupo;
        $curso->semestre = $request->semestre;
        $curso->titular = auth()->user()->id;
        $curso->turno = $request->turno;


        $curso->precio_unam = $request->precio_unam;
        $curso->precio_ext = $request->precio_ext;
        $curso->precio_gral = $request->precio_gral;

        if ($request->hasFile('temario')) {
            $temario = $request->temario;
            $nameTemario = "Temario_".$curso->nombre."_".$curso->semestre;
            $ruta = public_path().'/temarios';
            $temario->move($ruta, $nameTemario);
            $curso->temario=$nameTemario;
        }
         if ($request->hasFile('imagen')) {
             $imagen = $request->imagen;
            $nameImagen = "Imagen".$curso->nombre;
            $rutaImagen = public_path().'/img/logos/';
            $imagen->move($rutaImagen, $nameImagen);
            $curso->imagen=$nameImagen;
        }

        $curso->update();

        return redirect()->back()->with('success','El curso se ha actualizado existosamente');

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
