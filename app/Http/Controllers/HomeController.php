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
        $cursos = Curso::all()->where('tipo','Intersemestral');
        $carts=0;

         if (Auth::check()) {
            $carts = Cart::all()->where('user_id', auth()->user()->id);
        }
        $total=0;
        $i=0;
        return view('home', compact('cursos','carts','total','i'));
    }
}
