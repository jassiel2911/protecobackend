<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\TicketItem;
use App\Models\Cart;
use App\Models\User;


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

        $ticket->status = "Pendiente de ficha";
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

        return view('ticket-success', ['ticket_items'=>$ticket_items, 'total'=>$total, 'i'=>$i]);
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