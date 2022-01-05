<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprobantePagoController extends Controller
{
      public function depositobbva($id)
    {
        $ficha_id = $id;
        return view('comprobante.depositobbva', ['ficha_id'=>$ficha_id]);
    }

     public function appbbva($id)
    {
        $ficha_id = $id;
        return view('comprobante.appbbva', ['ficha_id'=>$ficha_id]);
    }
    
     public function otrobanco($id)
    {
        $ficha_id = $id;
        return view('comprobante.otrobanco', ['ficha_id'=>$ficha_id]);
    }
}
