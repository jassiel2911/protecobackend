@extends('layouts.admin')

@section('content')
<main class="container mt-5"> 

    @if(session('eliminado'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p>{{session('eliminado')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
 @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{session('success')}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
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
                        <li>{{$ticket_item->curso->nombre}}           
                        <form action="{{route('ticket-item.destroy', $ticket_item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button style="background-color:transparent; border:none;" type="submit"><span class="tag-category badge rounded-pill bg-danger">Eliminar</span></ style="background-color:transparent; border:none;">
                        </form>
                    </li>       
                    @endforeach
                  </ul>
               
            </div>
        </div>
    </div>
<hr>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3 class="text-azul">Detalles</h3><br>
                <form action="{{route('admintickets.update',$ticket->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="input-div">
                        <div class="row">
                            <div class="col-6">
                                <label for="classroom" class="form-label">Semestre</label>
                                <input type="text" name="semestre" value="{{$ticket->semestre}}">
                            </div>
                            <div class="col-6">
                                <label for="classroom" class="form-label">Monto</label>
                                <input type="text" name="total" value="{{$ticket->total}}">
                            </div>
                        </div>
                    </div>
                    <div class="input-div">
                        <div class="row">
                            <div class="col-6">
                                <label for="classroom" class="form-label">Status</label>
                                <select class="form-select" name="status" id="auth-select">
                                    <option value="Sin ficha" {{ $ticket->status == "Sin ficha" ? 'selected' : '' }}>Sin ficha</option>
                                    <option value="Pendiente de pago" {{ $ticket->status == "Pendiente de pago" ? 'selected' : '' }}>Pendiente de pago</option>
                                    <option value="Pago recibido. Pendiente de aprobación" {{ $ticket->status == "Pago recibido. Pendiente de aprobación" ? 'selected' : '' }}>Pago recibido. Pendiente de aprobación</option>
                                    <option value="Pagado" {{ $ticket->status == "Pagado" ? 'selected' : '' }}>Pagado</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <br>
                                <button type="submit" class="btn btn-form btn-rosa">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6">
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
            </div>
        </div>
    </div>

  

  

    <br><br>
    
   

    <br><br>
   

  
</main>

@endsection