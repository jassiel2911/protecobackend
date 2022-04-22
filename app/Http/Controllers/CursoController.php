<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;
use App\Models\Ticket;

use App\Models\TicketItem;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inters = Curso::all()->where('tipo','Intersemestral');
        $semestrales = Curso::all()->where('tipo','Semestral');
        $becarios = User::all()->where('role','<>','0');
        $tickets = TicketItem::all();
        $i=0;
        return view('admin.courses.index',['semestrales'=>$semestrales, 'inters'=>$inters, 'becarios'=>$becarios, 'tickets'=>$tickets, 'i'=>$i]);
    }

    public function semestrales()
    {
        return "hola";
        // $cursos = Curso::all()->where('tipo','semestrales');
        // return view('admin.courses.semestrales',compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $becarios = User::all()->where('role',1)->where('role',2);
        $becarios = User::where('role',1)->orWhere('role',2)->get();
        
        return view('admin.courses.create', ['becarios'=>$becarios]);
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
        $curso->publicado = $request->publicado;
        $curso->classroom = $request->classroom;
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
        $ticket_items = TicketItem::where('curso_id',$id)->get();
        $ticket = Ticket::all();
        $i=0;


        return view('admin.courses.show', ['curso'=>$curso, 'ticket_items'=>$ticket_items, 'ticket'=>$ticket, 'i'=>$i]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $becarios = User::where('role',1)->orWhere('role',2)->get();
        $curso=Curso::findOrFail($id);
        return view('admin.courses.edit', ['curso'=>$curso, 'becarios'=>$becarios]);

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
        $curso=Curso::findOrFail($id);
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
        $curso->publicado = $request->publicado;
        $curso->titular = $request->titular;
        $curso->turno = $request->turno;
        $curso->classroom = $request->classroom;





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
        $curso=Curso::findOrFail($id);
        $curso->delete();

        return redirect()->back()->with('success','El curso se ha eliminado');
    }

    public function inters()
    {
        return view('admin.courses.index');
    }

    
}
