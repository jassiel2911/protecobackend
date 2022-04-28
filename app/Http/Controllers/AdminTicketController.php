<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketItem;
use App\Models\Comprobante;
use App\Models\Ficha;
use App\Models\User;


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
        $total = 0;
        return view('admin.tickets.index', ['tickets'=>$tickets, 'total'=>$total]);
    }

    public function sinaprobar()
    {
        $tickets = Ticket::all()->where('status', "Pago recibido. Pendiente de aprobación");
        return view('admin.tickets.sinaprobar', ['tickets'=>$tickets]);
    }

    public function pagados()
    {
        $tickets = Ticket::all()->where('status', "Pagado");
        $total = 0;
        return view('admin.tickets.pagados', ['tickets'=>$tickets, 'total'=>$total]);
    }

     public function sinficha()
    {
        $tickets = Ticket::all()->where('status', "Sin ficha");
        $total = 0;
        return view('admin.tickets.sinficha', ['tickets'=>$tickets, 'total'=>$total]);
    }

     public function pendientepago()
    {
        $tickets = Ticket::all()->where('status', "Pendiente de pago");
        $total = 0;
        return view('admin.tickets.pendientepago', ['tickets'=>$tickets, 'total'=>$total]);
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
        $user = User::findOrFail($ticket->user_id);

        $ticket_items = TicketItem::all()->where('ticket_id', $id);
        $fichas = Ficha::all()->where('ticket_id', $id);
        $comprobantes = Comprobante::all();

        return view('admin.tickets.show', ['user'=>$user,'ticket'=>$ticket, 'ticket_items'=>$ticket_items, 'fichas'=>$fichas, 'comprobantes'=>$comprobantes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        $user = User::findOrFail($ticket->user_id);
        $ticket_items = TicketItem::all()->where('ticket_id', $id);
        $fichas = Ficha::all()->where('ticket_id', $id);
        $comprobantes = Comprobante::all();

        return view('admin.tickets.edit', ['user'=>$user,'ticket'=>$ticket, 'ticket_items'=>$ticket_items, 'fichas'=>$fichas, 'comprobantes'=>$comprobantes]);

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
        $ticket->status = $request->status;
        $ticket->total = $request->total;
        $ticket->semestre = $request->semestre;
        $ticket->update();

        return redirect()->back()->with('success', 'Se ha actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $ticket = Ticket::findOrFail($id);
         $ticket->delete();

         return redirect()->back()->with('success', 'Se ha eliminado correctamente');
    }
}
