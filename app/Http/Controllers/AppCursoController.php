<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Cursos;
use Illuminate\Support\Facades\Http;


class AppCursoController extends Controller
{

    private $cursos;

    public function __construct(Cursos $cursos)
    {

        $this->cursos = $cursos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = $this->cursos->all();
        return view('appMobile.mostrarCurso',compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = $this->cursos->all();
        return view('appMobile.crearCurso',compact('cursos'));
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
            'fecha' => 'required',
            'link' => 'required'
        ]);
        $curso = $this->cursos->create($storeData);
        return redirect('cursosApp')->with('completado', 'El curso ha sido guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = $this->cursos->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = $this->cursos->find($id);
        return view('appMobile.editarCurso',compact('curso'));
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
        $curso = $this->cursos->update($id,$storeData);
        return redirect('cursosApp')->with('completado', 'El curso ha sido modificado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = $this->cursos->remove($id);
        return redirect('cursosApp')->with('completado', 'El curso ha sido eliminado!');
    }
}
