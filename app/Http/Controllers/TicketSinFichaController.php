<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\TicketItem;
use App\Models\Cart;
use App\Models\User;
use App\Models\Ficha;
use App\Models\Curso;
class TicketSinFichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user_id = auth()->user()->id;
        $carts = Cart::where('user_id',$user_id)->get();

        $ticket = new Ticket();
        $id = $ticket->id;

        $ticket->user_id = $user_id;
        // $ticket->ficha_id = 000;
        // $ticket->comprobante_id = 000;

        $ticket->status = "Sin ficha";
        $ticket->total = $request->total;
        $ticket->semestre = "22-2";

        $ticket->save();

        foreach($carts as $cart){
            $ticket_item = new TicketItem();
            $ticket_item->curso_id=$cart->curso_id;
            $ticket_item->ticket_id= $ticket->id;
            if(auth()->user()->origin == "Comunidad UNAM"){
                $ticket_item->precio = 600;
            }else if(auth()->user()->origin == "Alumno externo"){
                $ticket_item->precio = 800;
            }
            else if(auth()->user()->origin == "Ex-alumno UNAM"){
                $ticket_item->precio = 900;
            }else if(auth()->user()->origin == "Publico en general"){
                $ticket_item->precio = 1000;
            }
            $ticket_item->save();
        }
        $total=0;
        $i=0;
        Cart::where('user_id',$user_id)->delete();

        $ticket_items = TicketItem::all()->where('ticket_id',$ticket->id);

        foreach($ticket_items as $ticket_item){
            $curso = Curso::all()->where('id', $ticket_item->curso_id)->first();
            $curso->cupo = $curso->cupo-1;
            $curso->save();
        }

        return view('ticket-success-sficha', ['ticket_items'=>$ticket_items, 'total'=>$total, 'i'=>$i, 'ticket'=>$ticket]);
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
        $ticket = Ticket::findOrFail($id);
        $total = $request->total;

        // $ficha = Ficha::all()->where('ticket_id',NULL)->first();

        if($total==600){
            $ficha = Ficha::where('monto', 600)
            ->where('ticket_id', NULL)->first();
            if($ficha==NULL){
                return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
            }
            $ficha->ticket_id = $ticket->id;
            $ficha->save();
            $ticket->status = "Pendiente de pago";
            // return redirect()->route('perfil.index')->with('ficha', 'q pez');
        }
        else if($total==800){
            $ficha = Ficha::where('monto', 800)
            ->where('ticket_id', NULL)->first();
            if($ficha==NULL){
                return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
            }
            $ficha->ticket_id = $ticket->id;
            $ficha->save();
            $ticket->status = "Pendiente de pago";

        }
        else if($total==900){
            $ficha = Ficha::where('monto', 900)
            ->where('ticket_id', NULL)->first();
            if($ficha==NULL){
                return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
            }
            $ficha->ticket_id = $ticket->id;
            $ficha->save();
            $ticket->status = "Pendiente de pago";

        }
        else if($total==1000){
            $ficha = Ficha::where('monto', 1000)
            ->where('ticket_id', NULL)->first();
            if($ficha==NULL){
                return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
            }
            $ficha->ticket_id = $ticket->id;
            $ficha->save();
            $ticket->status = "Pendiente de pago";

        }
        else if($total==1200){
             $fichas = Ficha::where('monto', 600)
             ->where('ticket_id', NULL)->take(2)->get();
           
            if($fichas==NULL){
                 $fichas = Ficha::where('monto', 1200)
                 ->where('ticket_id', NULL)->take(1)->get();

                if($fichas==NULL){
                    return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
                }
            }

            foreach($fichas as $ficha){
                $ficha->ticket_id = $ticket->id;
                $ficha->save();
            }
            $ticket->status = "Pendiente de pago";

        }
        else if($total==1600){
             $fichas = Ficha::where('monto', 800)
             ->where('ticket_id', NULL)->take(2)->get();
           
            if($fichas==NULL){
                return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
            }

            foreach($fichas as $ficha){
                $ficha->ticket_id = $ticket->id;
                $ficha->save();
            }
            $ticket->status = "Pendiente de pago";

        }
        else if($total==1800){
             $fichas = Ficha::where('monto', 900)
             ->where('ticket_id', NULL)->take(2)->get();
           
            if($fichas==NULL){
                return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
            }

            foreach($fichas as $ficha){
                $ficha->ticket_id = $ticket->id;
                $ficha->save();
            }
            $ticket->status = "Pendiente de pago";

           
        }
        else if($total==2000){
             $fichas = Ficha::where('monto', 1000)
             ->where('ticket_id', NULL)->take(2)->get();
           
            if($fichas==NULL){
                return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
            }

            foreach($fichas as $ficha){
                $ficha->ticket_id = $ticket->id;
                $ficha->save();
            }
            $ticket->status = "Pendiente de pago";

        }
        else if($total==2400){
              $fichas = Ficha::where('monto', 800)
             ->where('ticket_id', NULL)->take(3)->get();
           
            if($fichas==NULL){
                return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
            }

            foreach($fichas as $ficha){
                $ficha->ticket_id = $ticket->id;
                $ficha->save();
            }
            $ticket->status = "Pendiente de pago";

        }
        else if($total==2700){
              $fichas = Ficha::where('monto', 900)
             ->where('ticket_id', NULL)->take(4)->get();
           
            if($fichas==NULL){
                return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
            }

            foreach($fichas as $ficha){
                $ficha->ticket_id = $ticket->id;
                $ficha->save();
            }
            $ticket->status = "Pendiente de pago";

        }
         else if($total==3000){
        
              $fichas = Ficha::where('monto', 600)
             ->where('ticket_id', NULL)->take(5)->get();
           
            if($fichas==NULL){
                return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
            }

            foreach($fichas as $ficha){
                $ficha->ticket_id = $ticket->id;
                $ficha->save();
            }
            $ticket->status = "Pendiente de pago";

        }
         else if($total==3200){
        
              $fichas = Ficha::where('monto', 800)
             ->where('ticket_id', NULL)->take(4)->get();
           
            if($fichas==NULL){
                return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
            }

            foreach($fichas as $ficha){
                $ficha->ticket_id = $ticket->id;
                $ficha->save();
            }
            $ticket->status = "Pendiente de pago";

        }
         else if($total==3600){
        
              $fichas = Ficha::where('monto', 900)
             ->where('ticket_id', NULL)->take(4)->get();
           
            if($fichas==NULL){
                return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
            }

            foreach($fichas as $ficha){
                $ficha->ticket_id = $ticket->id;
                $ficha->save();
            }
            $ticket->status = "Pendiente de pago";

        }
        else if($total==4000){
        
              $fichas = Ficha::where('monto', 1000)
             ->where('ticket_id', NULL)->take(4)->get();
           
            if($fichas==NULL){
                return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
            }

            foreach($fichas as $ficha){
                $ficha->ticket_id = $ticket->id;
                $ficha->save();
            }
            $ticket->status = "Pendiente de pago";

        }
        else{
            return redirect()->route('perfil.index')->with('ficha', 'Tu ficha aún no está lista. Por favor manda correo a cursosproteco@gmail.com con el # de ticket. Gracias!');
        }

        $ticket->update();
        
        return redirect()->route('perfil.index')->with('ficha', 'Ya puedes descargar la(s) ficha(s).');
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
