<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all()->where('tipo','Intersemestral');
        return view('admin.courses.index',compact('cursos'));
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
        return view('admin.courses.create');
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

        $curso->precio_unam = $request->precio_unam;
        $curso->precio_ext = $request->precio_ext;
        $curso->precio_gral = $request->precio_gral;

        $temario = $request->temario;
        $nameTemario = "Temario_".$curso->nombre."_".$curso->semestre;
        $ruta = public_path().'/temarios';
        $temario->move($ruta, $nameTemario);
        $curso->temario=$nameTemario;

        $imagen = $request->imagen;
        $nameImagen = "Imagen".$curso->nombre;
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
        return view('admin.courses.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso=Curso::findOrFail($id);
        return view('admin.courses.edit', compact('curso'));

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
