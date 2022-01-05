@extends('layouts.app')

@section('content')

<main>
    <div class="container mx-auto mt-5 mb-5">
       <h2 class="text-rosa text-center">Ticket #{{$ticket->id}} generado con éxito</h2><br>
       <div class="mx-auto text-center">
        <h2>Detalles del ticket </h2>
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
        <p>A continuación encontrarás la(s) ficha(s) de pago con las que podrás hacer depósito o transferencia según sea tu caso. También podrás descargarlas en la sección de <b><a href="{{route('perfil.index')}}">Mi perfil</a></b></p>
        @foreach($fichas as $ficha)
            <a target="_blank" href="{{ asset("fichas/300/$ficha->file_ficha") }}">Ficha 1</a>
        @endforeach   
    </div>

    </div>
</main>

@endsection