@extends('layouts.app')

@section('content')

<main>
    <div class="container mx-auto mt-5 mb-5">
       <h2 class="text-rosa text-center">Ticket generado con éxito</h2><br>
       <div class="mx-auto text-center">
        <p>Detalles del ticket: </p>
         @foreach($ticket_items as $ticket_item)
            <div class=" mx-auto w-75">
                <div class="d-flex align-content-center align-items-center justify-content-between">
                    <div class="d-flex align-content-center align-items-center justify-content-between">
                        <img class="img-fluid" src="{{asset('/img/logos/'.$ticket_item->curso->imagen)}}" alt="" width="70">
                        <h5 class="text-start mx-4">{{$ticket_item->curso->nombre}}</h5>
                    </div>
                    <div class="d-flex align-content-center align-items-center justify-content-between"> 
                        <p class="d-none">{{$i = $i+1}}</p>
                        <p class="text-end">{{$ticket_item->precio}}</p>
                        <p class="d-none">{{$total = $total + $ticket_item->precio}}</p>
                    </div>
                </div>
            </div><br>
        @endforeach
        <hr>
         <div class="d-flex flex-column align-content-end align-items-end">
            <p><strong>Total: </strong>$ {{$total}}</p>
        </div>
       </div>

    </div>
</main>

@endsection