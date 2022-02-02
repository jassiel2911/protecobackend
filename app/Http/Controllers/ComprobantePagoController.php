<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprobantePagoController extends Controller
{
      public function depositobbva($ficha_id, $ticket_id)
    {
        $ficha_id = $ficha_id;
        $ticket_id = $ticket_id;
        return view('comprobante.depositobbva', ['ficha_id'=>$ficha_id, 'ticket_id'=>$ticket_id]);
    }

     public function appbbva($ficha_id, $ticket_id)
    {
        $ficha_id = $ficha_id;
        $ticket_id = $ticket_id;
        return view('comprobante.appbbva', ['ficha_id'=>$ficha_id, 'ticket_id'=>$ticket_id]);
    }
    
     public function otrobanco($ficha_id, $ticket_id)
    {
        $ficha_id = $ficha_id;
        $ticket_id = $ticket_id;
        return view('comprobante.otrobanco', ['ficha_id'=>$ficha_id, 'ticket_id'=>$ticket_id]);
    }
}
