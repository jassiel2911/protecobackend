<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cursos = Curso::all()->where('publicado','1');
        

        $carts=0;

         if (Auth::check()) {
            $carts = Cart::all()->where('user_id', auth()->user()->id);
        }
        $subtotal=0;
        $total=0;
        $i=0;
        return view('home', compact('cursos','carts','total','i', 'subtotal'));
    }

    public function inscripcion(){
        return view('inscripcion');
    }

    public function convocatoria(){
        return view('convocatoria');
    }
}
