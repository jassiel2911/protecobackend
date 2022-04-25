@extends('layouts.app')

@section('content')
<main class="container" style="margin-top:100px; padding-top:70px;">

     @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4>{{session('success')}}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('probatorio'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4>{{session('probatorio')}}</h4>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

     @if(session('ficha'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{session('ficha')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>

    <section class="container perfil py-3">
        <h1 class="text-rosa text-center">Bienvenido/a a tu perfil, {{$user->fname}} 👋</h1>
        <h3 class="text-azul text-center">Información personal</h3>

       
        <div class="card my-5 bg-azulclaro card-info" >
          <div class="card-body">
            <p><b>Nombre completo: </b>{{$user->fname}} {{$user->lname}}</p>
            <p><b>Correo: </b>{{$user->email}}</p>
            <p><b>Procedencia: </b>{{$user->origin}}</p>
            @if($user->origin == "Publico en general")
              <div class="bg-grisclaro p-2" style="max-width: 30rem;">
                <p>
                  ¿Eres comunidad UNAM o estudiante de otra escuela? Sube aquí tu credencial o comprobante y recibe un descuento <br>
                  *Comunidad UNAM incluye estudiantes, ex-alumnos y trabajadores
                </p>
                <form action="{{route('estudiante.update', auth()->user()->id)}}" class="" method="POST" enctype="multipart/form-data">
                  @method('PATCH')
                  @csrf
                  <p class="text-rosa">Comunidad UNAM</p>
                  <div class="d-flex my-3">
                    <input type="file" name="probatorio" id="" class="bg-grisclaro border-0" required>
                    <input type="hidden" name="origin" value="Comunidad UNAM">
                    <button type="submit" class="btn btn-rosa">Subir</button>
                  </div>
                </form>
                 <form action="{{route('estudiante.update', auth()->user()->id)}}" class="" method="POST" enctype="multipart/form-data">
                  @method('PATCH')
                  @csrf
                  <p class="text-rosa">Alumno externo</p>
                  <div class="d-flex my-3">
                    <input type="file" name="probatorio" id="" class="bg-grisclaro border-0" required>
                    <input type="hidden" name="origin" value="Alumno externo">
                    <button type="submit" class="btn btn-rosa">Subir</button>
                  </div>
                </form>
              </div>
               
            @endif
            <div class="d-flex my-2">
                <a href="{{route('editar-perfil.edit', auth()->user()->id)}}" class="btn btn-rosa">Editar</a>
            </div>
          </div>
        </div>
       <h2 class="home-subtitulo">Mis tickets</h2>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><br>
              @if(auth()->user()->origin != "Comunidad UNAM")
                <!-- <div class="alert alert-warning" role="alert">
                  <p>Si eres egresado de la UNAM o trabajador, también cuentas como comunidad UNAM, manda correo a cursosproteco@gmail.com antes de hacer el pago y puedo cambiar el total de tu ticket :) </p>
                </div> -->
              @endif
                @foreach($tickets as $ticket)
                <div class="card my-5 bg-grisclaro" >
                    <div class="card-header">
                       <h4> #{{$ticket->id}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p><b>Total: </b>${{$ticket->total}}</p>
                                <p><b>Status: </b>{{$ticket->status}}</p>
                                <!-- <p>Las fichas estarán disponibles a partir del día Lunes 10 de enero</p> -->
                                <!-- Para tickets s/ficha -->
                                @if($ticket->status=="Sin ficha")
                                    <form action="{{route('ticketsficha.update', $ticket->id)}}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <input type="hidden" name="total" value="{{$ticket->total}}">
                                        <button type="submit" class="btn btn-rosa text-center text-white bg-rosa">Generar ficha</button>
                                    </form>
                                @endif

                                @if($ticket->status=="Pendiente de pago")
                                    <p><b>Fichas de pago: </b></p>
                                    <!-- <ul> -->
                                       <!-- @foreach($fichas as $ficha)
                                      @if($ficha->ticket_id == $ticket->id)
                                        <li class="my-3">
                                          Ficha {{$ficha->id}} ->
                                          <a download target="_blank" class="text-rosa" href="{{ asset("fichas/$ficha->monto/$ficha->file_ficha") }}">Descargar</a> 
                                          o <a  target="_blank" class="text-rosa" href="{{ asset("fichas/$ficha->monto/$ficha->file_ficha") }}">Abrir</a>
                                        </li>
                                      @endif
                                    </ul>
                                   
                                    @endforeach -->
                                     <table class="table" >
                                      <thead>
                                        <tr>
                                          <th scope="col"></th>
                                          <th scope="col">Monto</th>
                                        </tr>
                                      </thead>
                                      <tbody style="overflow-x:scroll">
                                        @foreach($fichas as $ficha)
                                          @if($ficha->ticket_id == $ticket->id)
                                          <tr>
                                            <td>Ficha {{$ficha->id}} <br><a download target="_blank" class="text-rosa" href="{{ asset("fichas/$ficha->monto/$ficha->file_ficha") }}">Descargar</a> <br><a  target="_blank" class="text-rosa" href="{{ asset("fichas/$ficha->monto/$ficha->file_ficha") }}">Abrir</a></td>
                                            <td>
                                              <div class="row">
                                                <div class="col-12 col-md-6">
                                                  ${{$ficha->monto}}
                                                </div>
                                                <div class="col-12 col-md-6">
                                                  @if($ficha->comprobante==0)
                                                   <div class="dropdown">
                                                    <a style="color: #fff; " class="d-inline-block btn btn-amarillo dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                      Subir comprobante
                                                    </a>
                                                       <ul class="dropdown-menu bg-azulclaro" aria-labelledby="dropdownMenuLink">
                                                          <li><a class="dropdown-item" href="{{url("depositobbva/$ficha->id/$ticket->id")}}">Depósito BBVA</a></li>
                                                          <li><a class="dropdown-item" href="{{url("appbbva/$ficha->id/$ticket->id")}}">App BBVA o transferencia BBVA</a></li>
                                                          <li><a class="dropdown-item" href="{{url("otrobanco/$ficha->id/$ticket->id")}}">Otro banco</a></li>
                                                      </ul>
                                                  </div>
                                                  @else
                                                    <p>Ya has subido el comprobante</p>
                                                  @endif
                                                </div>
                                              </div>
                                            </td>
                                            <!-- <td>
                                              
                                            </td> -->
                                          </tr>
                                          @endif
                                        @endforeach
                                      </tbody>
                                    </table>
                                    <p class="text-danger">*Por favor sube un comprobante por ficha</p>
                                    ¿Tienes dudas acerca de cómo pagar?  <a target="_blank" href="{{asset('img/ComoPagar-CursosPROTECO22-1.png')}}">Revisa esta infografía</a>

                                   
                        
                                @endif

                                 

                               
                            </div>
                            <div class="col-12 col-md-4 my-3">
                                <p><b>Cursos: </b></p>
                                <ul>
                                    <!-- <div class="alert alert-primary d-flex align-items-center" role="alert">
                                        <p>Ingresa al link de Google Classroom para que tengas acceso a la información del curso (incluyendo el link de la videollamada)</p>
                                    </div> -->
                                    @foreach($ticket_items as $ticket_item)
                                        @if($ticket_item->ticket_id == $ticket->id)
                                            <li class="my-3">{{$ticket_item->curso->nombre}}<br>
                                                @if($ticket->status=="Pagado")
                                                <p>Link a Google Classroom: <a href="{{$ticket_item->curso->classroom}}">{{$ticket_item->curso->classroom}}</a></p>
                                                @endif
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
          <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> -->
        </div>
    </section>

</main>
@endsection
