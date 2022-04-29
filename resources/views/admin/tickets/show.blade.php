@extends('layouts.admin')

@section('content')
<main class="container mt-5"> 

  <a href="{{route('admintickets.index')}}">Regresar</a><br><br>
  <h1 class="text-rosa">Editar ticket #{{$ticket->id}}</h1>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                  <h3 class="text-azul">Usuario</h3><br>
                <p>Nombre: {{$user->fname." ".$user->lname}}</p>
                <p>Procedencia: {{$user->origin}}</p>
            </div>
            <div class="col-12 col-md-6">
                  <h3 class="text-azul">Cursos</h3><br>
                  <ul>
                     @foreach($ticket_items as $ticket_item)
                        <li>{{$ticket_item->curso->nombre}}</li>
                    @endforeach
                  </ul>
               
            </div>
        </div>
    </div>
<hr>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <h3 class="text-azul">Detalles</h3><br>
                <p>Semestre: {{$ticket->semestre}}</p>
                <p>Monto: {{$ticket->total}}</p>
                <p>Status: {{$ticket->status}}  </p>
                @if($ticket->status != "Pagado")
                 <form method="POST" action="{{ route('ticket.update', $ticket->id) }}" >
                     @method('PATCH')
                    @csrf
                    <button type="submit" class="btn w-25 btn-rosa">Aprobar</button>
                  </form>
                @endif
            </div>
            <div class="col-12 col-md-12 my-4">
                 <h3 class="text-azul">Fichas de pago</h3><br>
                @foreach($fichas as $ficha)
                   <div class="card">
                    <h5 class="card-header"><a target="_blank" href="{{ asset("fichas/300/$ficha->file_ficha") }}">Ficha #{{$ficha->id}}</a></h5>
                    <div class="card-body p-3">
                        <p>Monto: {{$ficha->monto}}</p>
                        <h5 class="text-rosa">Comprobante</h5>
                        <table class="table">
                          <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Método</th>
                                <th scope="col">Banco</th>
                                <th scope="col">#ficha</th>
                                <th scope="col">Últimos digitos</th>
                                <th scope="col">CIE</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Archivo</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($comprobantes as $comprobante)
                                @if($comprobante->ficha_id == $ficha->id)
                                <tr>
                                    <th scope="row">{{$comprobante->id}}</th>
                                    <td>{{$comprobante->fecha}}</td>
                                    <td>{{$comprobante->metodo_pago}}</td>
                                    <td>{{$comprobante->banco}}</td>
                                    <td>{{$comprobante->no_ficha}}</td>
                                    <td>{{$comprobante->ultimos_digitos}}</td>
                                    <td>{{$comprobante->cie}}</td>
                                    <td>{{$comprobante->monto}}</td>
                                    <td>
                                        <img src="{{asset("comprobantes/$comprobante->captura")}}" alt="" width="700">
                                        <a target="_blank" href="{{asset("comprobantes/$comprobante->captura")}}">Ver archivo</a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                          </tbody>
                        </table>
                        <!-- <img src="{{asset("comprobantes/$comprobante->captura")}}" alt="" width="700">
                        <a target="_blank" href="{{asset("comprobantes/$comprobante->captura")}}">Ver archivo</a> -->
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

  

  

    <br><br>
    
   

    <br><br>
   

  
</main>

@endsection