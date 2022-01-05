@extends('layouts.admin')

@section('content')
<main class="container mt-5"> 

    @if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <p>{{session('success')}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

  <h1 class="text-rosa">Ver ticket #{{$ticket->id}}</h1>

    <br><br>
    <h3 class="text-azul">Cursos</h3><br>
    @foreach($ticket_items as $ticket_item)
        <p>{{$ticket_item->curso->nombre}}</p>
    @endforeach

    <br><br>
    <h3 class="text-azul">Detalles</h3><br>
    <p>Semestre: {{$ticket->semestre}}</p>
    <p>Monto: {{$ticket->total}}</p>
    <p>Status: {{$ticket->status}}  </p>
     <form method="POST" action="{{ route('ticket.update', $ticket->id) }}" >
         @method('PATCH')
        @csrf
        <button type="submit" class="btn-form w-25 btn-rosa">Aprobar</button>
      </form>
   

    <br><br>
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
                    </tr>
                    @endif
                @endforeach
              </tbody>
            </table>
            <img src="{{asset("comprobantes/$comprobante->captura")}}" alt="" width="700">
        </div>
        </div>
    @endforeach

  
</main>

@endsection