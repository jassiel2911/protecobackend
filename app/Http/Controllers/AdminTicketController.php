<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketItem;
use App\Models\Comprobante;
use App\Models\Ficha;


class AdminTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.tickets.index', ['tickets'=>$tickets]);
    }

    public function sinaprobar()
    {
        $tickets = Ticket::all()->where('status', "Pago recibido. Pendiente de aprobación");
        return view('admin.tickets.sinaprobar', ['tickets'=>$tickets]);
    }

    public function pagados()
    {
        $tickets = Ticket::all()->where('status', "Pagado");;
        return view('admin.tickets.pagados', ['tickets'=>$tickets]);
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
        $ticket = Ticket::findOrFail($id);
        $ticket_items = TicketItem::all()->where('ticket_id', $id);
        $fichas = Ficha::all()->where('ticket_id', $id);
        $comprobantes = Comprobante::all();

        return view('admin.tickets.show', ['ticket'=>$ticket, 'ticket_items'=>$ticket_items, 'fichas'=>$fichas, 'comprobantes'=>$comprobantes]);
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
