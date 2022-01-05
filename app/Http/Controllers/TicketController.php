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



class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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

        $ticket->status = "Pendiente de pago";
        $ticket->total = $request->total;
        $ticket->semestre = "22-1";

        $ticket->save();

        foreach($carts as $cart){
            $ticket_item = new TicketItem();
            $ticket_item->curso_id=$cart->curso_id;
            $ticket_item->ticket_id= $ticket->id;
            if(auth()->user()->origin == "Comunidad UNAM"){
                $ticket_item->precio = 500;
            }else if(auth()->user()->origin == "Alumno externo"){
                $ticket_item->precio = 600;
            }else if(auth()->user()->origin == "Publico en general"){
                $ticket_item->precio = 700;
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

        $ficha = Ficha::all()->where('ticket_id',NULL)->first();
        $ficha->ticket_id = $ticket->id;

        $ficha->save();

        $fichas = Ficha::all()->where('ticket_id',$ticket->id);


        return view('ticket-success', ['fichas'=>$fichas, 'ticket_items'=>$ticket_items, 'total'=>$total, 'i'=>$i, 'ticket'=>$ticket]);
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
         $ticket->status="Pagado";
         $ticket->update();

        $ticket_items = TicketItem::all()->where('ticket_id',$ticket->id);

        foreach($ticket_items as $ticket_item){
            $curso = Curso::all()->where('id', $ticket_item->curso_id)->first();
            $curso->inscritos = $curso->inscritos+1;
            $curso->save();
        }

        

        return redirect()->back()->with('success', 'Ticket aprobado');
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
