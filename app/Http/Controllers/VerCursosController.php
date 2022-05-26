<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Cart;

use Illuminate\Support\Facades\Auth;

class VerCursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Curso::all()->where('publicado', '1');
        // $programacion = Curso::all()->where('cat','Programación');
        $programacion = Curso::all()->where('cat', 'Programación')
         ->where('publicado', '1');
         $bases = Curso::all()->where('cat', 'Bases de Datos')
         ->where('publicado', '1');
         $hardware = Curso::all()->where('semestre', 'Presencial')
         ->where('publicado', '1');
         $desarrollo = Curso::all()->where('cat', 'Desarrollo')
         ->where('publicado', '1');
         $otros = Curso::all()->where('cat', 'Otros')
         ->where('publicado', '1');
         $AM = Curso::all()->where('turno', 'AM')
         ->where('publicado', '1');
         $PM = Curso::all()->where('turno', 'PM')
         ->where('publicado', '1');
        $success="no success";

         $carts=0;

         if (Auth::check()) {
            $carts = Cart::all()->where('user_id', auth()->user()->id);
        }
        $subtotal=0;
        $total=0;
        $i=0;


        return view('vercursos.todos', ['subtotal'=>$subtotal,'total'=>$total,'i'=>$i,'carts'=>$carts,'success'=>$success,'AM'=>$AM,'PM'=>$PM,'todos'=>$todos,'bases'=>$bases,'hardware'=>$hardware,'desarrollo'=>$desarrollo,'otros'=>$otros,'programacion'=>$programacion]);
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
