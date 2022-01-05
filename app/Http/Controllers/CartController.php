<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Curso;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "hola";
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
        if (Auth::check()) {
            // La variable "cartsBefore" obtiene el carrito ANTES de agregar el nuevo curso, después, 
            // el condicional IF comprueba si existe o no el id del curso dentro del carrito del usuario, 
            // en caso de existir, se nos regresará el modelo, sin embargo, si no se encuentra en la base de datos, 
            // se nos regresará “null”.

            // El condicional comprueba si es  null y si se cumple se ejecuta el código que guarda el nuevo curso en el carrito, 
            // en el else, se ejecuta el código necesario para mostrar un mensaje de error en la pagina principal.

            $cartsBefore = Cart::where('user_id', auth()->user()->id)->get();
            if($cartsBefore->get($request->curso_id) == NULL){
                $cart = new Cart;
                $cart->user_id=auth()->user()->id;
                $cart->curso_id=$request->curso_id;
                $cart->save();

                $carts = Cart::where('user_id', auth()->user()->id)->get();
                return redirect()->back()->with('success','success');
            }else{
                
                return redirect()->back()->with('mistake','mistake');
            }
            
            // $user = $carts->find($request->curso_id);
            
            
        }
        else{
            return redirect('/login')->with('error','Para agregar cursos a tu carrito por favor inicia sesión');
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $i=0;
        $total=0;
        return view('cart', compact('carts','i','total'));
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
        $carts = Cart::where('user_id', auth()->user()->id)
        ->where('curso_id',$id)->delete();

        return redirect()->back()->with('success','success');
    }
}
