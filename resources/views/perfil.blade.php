@extends('layouts.app')

@section('content')
<main class="container mt-5">

     @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1 class="text-rosa">Bienvenido a tu perfil {{$user->fname}}</h1>
    <br><br>
    <h2 class="text-azul">Datos personales</h2><a href="">Editar</a><br> <br>
    <div class="row">
        <div class="col-6">
            <p><b>Nombre: </b>{{$user->fname}} {{$user->lname}}</p>
            <p><b>Correo: </b>{{$user->email}}</p>
            <p><b>Procedencia: </b>{{$user->origin}}</p>

        </div>
        <div class="col-6">

        </div>
    </div><br><br>  
    <h2 class="text-azul">Mis tickets</h2><br> <br>
    @foreach($tickets as $ticket)
        <div class="card w-75">
        <div class="card-header">
            <h4>Id #{{$ticket->id}}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    @foreach($ticket_items as $ticket_item)
                        @if($ticket_item->ticket_id == $ticket->id)
                            <p>{{$ticket_item->curso->nombre}}</p>
                        @endif
                    @endforeach
                </div>
                <div class="col-6">
                    <h5 class="card-title">Semestre {{$ticket->semestre}}</h5>
                    <p class="card-text">${{$ticket->total}}</p>
                    <p>Status: {{$ticket->status}}</p>
                    @if($ticket->status=="Pendiente de pago")
                         @foreach($fichas as $ficha)
                            @if($ficha->ticket_id == $ticket->id)
                                <p>Ficha {{$ficha->id}} <a target="_blank" href="{{ asset("fichas/300/$ficha->file_ficha") }}">Descargar</a> </p>
                                <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Subir comprobante
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{url("depositobbva/$ficha->id")}}">Depósito BBVA</a></li>
                                    <li><a class="dropdown-item" href="{{url("appbbva/$ficha->id")}}">App BBVA o transferencia BBVA</a></li>
                                    <li><a class="dropdown-item" href="{{url("otrobanco/$ficha->id")}}">Otro banco</a></li>
                                </ul>
                                </div>
                            @endif
                        @endforeach
                        
                    @endif
                </div>
            </div>
        </div>
        </div><br>
    @endforeach
</main>
@endsection
