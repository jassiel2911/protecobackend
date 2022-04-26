<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;

class FichasMontoController extends Controller
{
    public function quinientos()
    {
        $fichas = Ficha::all()->where('monto',500);
        return view('admin.fichas.500', ['fichas'=>$fichas]);
    }
     public function mil()
    {
        $fichas = Ficha::all()->where('monto',1000);
        return view('admin.fichas.1000', ['fichas'=>$fichas]);
    }

     public function seiscientos()
    {
        $fichas = Ficha::all()->where('monto',600);
        return view('admin.fichas.600', ['fichas'=>$fichas]);
    }
     public function mildoscientos()
    {
        $fichas = Ficha::all()->where('monto',1200);
        return view('admin.fichas.1200', ['fichas'=>$fichas]);
    }

     public function setescientos()
    {
        $fichas = Ficha::all()->where('monto',700);
        return view('admin.fichas.700', ['fichas'=>$fichas]);
    }
     public function milcuatroscientos()
    {
        $fichas = Ficha::all()->where('monto',1400);
        return view('admin.fichas.1400', ['fichas'=>$fichas]);
    }
}
