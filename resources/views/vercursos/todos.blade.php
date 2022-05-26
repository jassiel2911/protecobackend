@extends('layouts.app')

@section('content')
<main>
    @if($success=="success" || $success=="1")
        <script>
        window.onload = function() {
            var element = document.getElementById("carousel-logos");
            element.scrollIntoView();
        };
        </script>
        <div class="modal fade show d-block justify-content-center align-content-center align-items-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0,0,0,.5)">
            <div class="modal-dialog">
                <div class="modal-content">
                @if($success==1)
                <div class="alert alert-warning fade show" role="alert">
                    <p>Solo puedes agregar el curso una vez</p>
                </div>
                @endif
                <div class="modal-header px-5">
                    <h3 class="modal-title text-rosa" id="exampleModalLabel">Tu carrito <img src="{{asset('img/icons/generales/cart.svg')}}" alt="" width="30"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
                </div>
                <div class="modal-body">
                    @foreach($carts as $cart)
                        <div class=" d-flex align-content-center align-items-center justify-content-between">
                            <div class="d-flex align-content-center align-items-center">
                                <img class="img-fluid" src="{{asset('/img/logos/'.$cart->curso->imagen)}}" alt="" width="70">
                                <h5 class="text-start mx-4">{{$cart->curso->nombre}}</h5>
                            </div>
                             <div class="d-flex align-content-center align-items-center justify-content-center">
                                <p class="d-none">{{$i = $i+1}}</p>
                                @if(auth()->user()->origin == "Comunidad UNAM")
                                    <p style="margin:0; padding-right:8px;" class="text-start">$500</p>
                                    <p class="d-none">{{$subtotal = $subtotal + 500}}</p>
                                    @if($loop->index == 2 || $loop->index == 5 || $loop->index == 8)
                                    
                                    @else
                                    <p class="d-none">{{$total = $total + 500}}</p>
                                    @endif
                                @elseif(auth()->user()->origin == "Alumno externo")
                                    <p style="margin:0; padding-right:8px;" class="text-start">$600</p>
                                    <p class="d-none">{{$subtotal = $subtotal + 600}}</p>
                                    @if($loop->index == 2 || $loop->index == 5 || $loop->index == 8)
                                    
                                    @else
                                    <p class="d-none">{{$total = $total + 600}}</p>
                                    @endif
                                @elseif(auth()->user()->origin == "Publico en general")
                                    <p style="margin:0; padding-right:8px;" class="text-start">$700</p>
                                    <p class="d-none">{{$subtotal = $subtotal + 700}}</p>
                                    @if($loop->index == 2 || $loop->index == 5 || $loop->index == 8)
                                    
                                    @else
                                    <p class="d-none">{{$total = $total + 700}}</p>
                                    @endif
                                @endif
                                <form action="{{route('cart-cursos.destroy',$cart->curso_id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="border-0 bg-transparent trash"><img class="img-fluid" src="img/icons/generales/trash.svg" alt="" style="width:30px;"></button>
                                </form>
                            </div>
                        </div><br>
                    @endforeach
                    <hr>
                     @if(auth()->user()->origin == "Publico en general")
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <p class="text-end">
                        <svg class="bi flex-shrink-0" width="40" height="40" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <b>¿Eres comunidad UNAM o estudiante de otra escuela?</b><br>Sube <a class="text-rosa" href="{{route('perfil.index')}}">aquí</a> tu credencial o comprobante y recibe un descuento</p>
                    </div>
                    @endif
                    <p class="text-end"><b>Subtotal: </b> ${{$subtotal}}</p>
                    <p class="text-end">@if($i>=3)<b class="text-rosa ">Promoción 3x2 aplicada &#128640; </b>@endif<b>Total: </b> ${{$total}}</p>
                     <div class="modal-footer d-flex justify-content-end text-end">
                        <form action="{{route('ticketsficha.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="total" value="{{$total}}">
                            <a type="button" class="d-inline-block btn-delgado btn-lavanda" href="{{route('cart.show', auth()->user()->id)}}">Ver carrito</a>
                            <button type="submit" class="d-inline-block  btn-delgado btn-rosa">Generar ticket</button>
                        </form>
                        <!-- <form action="{{route('ticket.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="total" value="{{$total}}">
                            <a type="button" class="d-inline-block btn-delgado btn-lavanda" href="{{route('cart.show', auth()->user()->id)}}">Ver carrito</a>
                            <button type="submit" class="d-inline-block  btn-delgado btn-rosa">Generar ticket</button>
                        </form> -->
                      </div>
                </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        function closeModal(){
            // alert('close');
            var modal = document.getElementById("exampleModal");
            modal.classList.remove("show");
            modal.classList.remove("d-block");
        }
    </script>
    <!-- modal ex -->
        <style>
            .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
                color: #fff;
                background-color: var(--rosa);
            }
        </style>
    <section class="container  py-5">
        <h1 class="text-rosa text-center mb-4">Cursos semestrales</h1><br>
        <ul class="nav bg-azul nav-pills nav-pills-cursos mb-3 d-flex justify-content-between" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-todos-tab" data-bs-toggle="pill" data-bs-target="#pills-todos" type="button" role="tab" aria-controls="pills-todos" aria-selected="true">Todos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-programacion-tab" data-bs-toggle="pill" data-bs-target="#pills-programacion" type="button" role="tab" aria-controls="pills-programacion" aria-selected="false">Programación</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-bases-tab" data-bs-toggle="pill" data-bs-target="#pills-bases" type="button" role="tab" aria-controls="pills-bases" aria-selected="false">Bases de datos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-desarrollo-tab" data-bs-toggle="pill" data-bs-target="#pills-desarrollo" type="button" role="tab" aria-controls="pills-desarrollo" aria-selected="false">Desarrollo</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-otros-tab" data-bs-toggle="pill" data-bs-target="#pills-otros" type="button" role="tab" aria-controls="pills-otros" aria-selected="false">Otros</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-matutinos-tab" data-bs-toggle="pill" data-bs-target="#pills-matutinos" type="button" role="tab" aria-controls="pills-matutinos" aria-selected="false">Matutinos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-vespertinos-tab" data-bs-toggle="pill" data-bs-target="#pills-vespertinos" type="button" role="tab" aria-controls="pills-vespertinos" aria-selected="false">Vespertinos</button>
            </li>
             <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-hardware-tab" data-bs-toggle="pill" data-bs-target="#pills-hardware" type="button" role="tab" aria-controls="pills-hardware" aria-selected="false">Presencial</button>
            </li>
        </ul>
        <div class="tab-content   home-cursos bg-transparent" id="pills-tabContent" style="margin:0; padding:0">
            <div class="tab-pane fade show active py-3" id="pills-todos" role="tabpanel" aria-labelledby="pills-todos-tab">
                <!-- <form class="d-flex justify-content-end">
                    <input class="form-control me-2 w-25" type="search" placeholder="Buscar" aria-label="Search">
                </form> -->
                <!-- Todos -->
                <div class="row">
                    <!-- <h3>Semana 1</h3> -->
                    @foreach($todos as $todo)
                    <div class="col-3">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="card-img">
                                    <img src="{{asset('/img/logos/'.$todo->imagen)}}" alt="">
                                </div>
                                <div class="card-text">
                                    <h4 class="card-text_titulo">{{$todo->nombre}}</h4>
                                    <div class="d-none">{{setlocale(LC_ALL, 'es_ES')}}</div>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">calendar_month</span>
                                        {{\Carbon\Carbon::parse($todo->fecha_inicio)->translatedFormat('j F') }} -  {{\Carbon\Carbon::parse($todo->fecha_fin)->translatedFormat('j F') }}
                                    </p>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">schedule</span>
                                        {{Carbon\Carbon::parse($todo->hora_inicio)->format('g:i a')}} - {{Carbon\Carbon::parse($todo->hora_fin)->format('g:i a')}}
                                    </p>
                                    <hr>
                            
                                </div>
                                    <div class="card-links">
                                    <div class="card-links-botones">
                                        <a target="_blank" class="link-temario" href="{{asset("temarios/$todo->temario")}}">Ver temario</a>
                                    </div>
                                    <div class="d-flex">
                                        <form class="d-flex" action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                            <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                            <input type="hidden" name="curso_id" value="{{$todo->id}}">
                                            <button type="submit" class="ml-4 bg-transparent border-0" title="Añadir al carrito">
                                                <span class="material-symbols-outlined">add_shopping_cart</span>
                                            </button>
                                            <span class="flip d-block" title="Ver detalles">
                                                <span class="material-symbols-outlined">more_vert</span>
                                            </span>    
                                            <!-- atras -->
                                            <div class="panel bg-light text-dark">
                                                <p class="panel-p">
                                                    <span>Antecedentes:</span> Ninguno  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Equipo:</span> Computadora con acceso a internet  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Cupo:</span> 20  
                                                </p>
                                                <h5 class="card-list_precios">Precios</h5>
                                                <p title="Alumnos, ex-alumnos y trabajadores" class="panel-p">
                                                    <span>Comunidad UNAM:</span> $600  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Estudiantes externos:</span> $800  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Ex alumnos:</span> $900  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Publico general:</span> $1000  
                                                </p>

                                                </div>
                                        </form>
                            
                                    </div>
                            
                                </div>
                            </div>
                        </div>   
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="pills-programacion" role="tabpanel" aria-labelledby="pills-programacion-tab">
                <div class="row">
                    @foreach($programacion as $progra)
                    <div class="col">
                         <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="card-img">
                                    <img src="{{asset('/img/logos/'.$progra->imagen)}}" alt="">
                                </div>
                                <div class="card-text">
                                    <h4 class="card-text_titulo">{{$progra->nombre}}</h4>
                                    <div class="d-none">{{setlocale(LC_ALL, 'es_ES')}}</div>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">calendar_month</span>
                                        {{\Carbon\Carbon::parse($progra->fecha_inicio)->translatedFormat('j F') }} -  {{\Carbon\Carbon::parse($progra->fecha_fin)->translatedFormat('j F') }}
                                    </p>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">schedule</span>
                                        {{Carbon\Carbon::parse($progra->hora_inicio)->format('g:i a')}} - {{Carbon\Carbon::parse($progra->hora_fin)->format('g:i a')}}
                                    </p>
                                    <hr>
                            
                                </div>
                                    <div class="card-links">
                                    <div class="card-links-botones">
                                        <a target="_blank" class="link-temario" href="{{asset("temarios/$progra->temario")}}">Ver temario</a>
                                    </div>
                                    <div class="d-flex">
                                        <form class="d-flex" action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                            <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                            <input type="hidden" name="curso_id" value="{{$progra->id}}">
                                            <button type="submit" class="ml-4 bg-transparent border-0" title="Añadir al carrito">
                                                <span class="material-symbols-outlined">add_shopping_cart</span>
                                            </button>
                                            <span class="flip d-block" title="Ver detalles">
                                                <span class="material-symbols-outlined">more_vert</span>
                                            </span>    
                                            <!-- atras -->
                                            <div class="panel bg-light text-dark">
                                                <p class="panel-p">
                                                    <span>Antecedentes:</span> Ninguno  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Equipo:</span> Computadora con acceso a internet  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Cupo:</span> 20  
                                                </p>
                                                <h5 class="card-list_precios">Precios</h5>
                                                <p title="Alumnos, ex-alumnos y trabajadores" class="panel-p">
                                                    <span>Comunidad UNAM:</span> $600  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Estudiantes externos:</span> $800  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Ex alumnos:</span> $900  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Publico general:</span> $1000  
                                                </p>

                                                </div>
                                        </form>
                            
                                    </div>
                            
                                </div>
                            </div>
                        </div> 
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="pills-bases" role="tabpanel" aria-labelledby="pills-bases-tab">
                 <div class="row">
                    @foreach($bases as $base)
                    <div class="col">
                         <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="card-img">
                                    <img src="{{asset('/img/logos/'.$base->imagen)}}" alt="">
                                </div>
                                <div class="card-text">
                                    <h4 class="card-text_titulo">{{$base->nombre}}</h4>
                                    <div class="d-none">{{setlocale(LC_ALL, 'es_ES')}}</div>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">calendar_month</span>
                                        {{\Carbon\Carbon::parse($base->fecha_inicio)->translatedFormat('j F') }} -  {{\Carbon\Carbon::parse($base->fecha_fin)->translatedFormat('j F') }}
                                    </p>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">schedule</span>
                                        {{Carbon\Carbon::parse($base->hora_inicio)->format('g:i a')}} - {{Carbon\Carbon::parse($base->hora_fin)->format('g:i a')}}
                                    </p>
                                    <hr>
                            
                                </div>
                                    <div class="card-links">
                                    <div class="card-links-botones">
                                        <a target="_blank" class="link-temario" href="{{asset("temarios/$base->temario")}}">Ver temario</a>
                                    </div>
                                    <div class="d-flex">
                                        <form class="d-flex" action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                            <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                            <input type="hidden" name="curso_id" value="{{$base->id}}">
                                            <button type="submit" class="ml-4 bg-transparent border-0" title="Añadir al carrito">
                                                <span class="material-symbols-outlined">add_shopping_cart</span>
                                            </button>
                                            <span class="flip d-block" title="Ver detalles">
                                                <span class="material-symbols-outlined">more_vert</span>
                                            </span>    
                                            <!-- atras -->
                                            <div class="panel bg-light text-dark">
                                                <p class="panel-p">
                                                    <span>Antecedentes:</span> Ninguno  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Equipo:</span> Computadora con acceso a internet  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Cupo:</span> 20  
                                                </p>
                                                <h5 class="card-list_precios">Precios</h5>
                                                <p title="Alumnos, ex-alumnos y trabajadores" class="panel-p">
                                                    <span>Comunidad UNAM:</span> $600  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Estudiantes externos:</span> $800  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Ex alumnos:</span> $900  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Publico general:</span> $1000  
                                                </p>

                                                </div>
                                        </form>
                            
                                    </div>
                            
                                </div>
                            </div>
                        </div> 
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="pills-desarrollo" role="tabpanel" aria-labelledby="pills-desarrollo-tab">
                 <div class="row">
                    @foreach($desarrollo as $des)
                    <div class="col">
                         <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="card-img">
                                    <img src="{{asset('/img/logos/'.$des->imagen)}}" alt="">
                                </div>
                                <div class="card-text">
                                    <h4 class="card-text_titulo">{{$des->nombre}}</h4>
                                    <div class="d-none">{{setlocale(LC_ALL, 'es_ES')}}</div>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">calendar_month</span>
                                        {{\Carbon\Carbon::parse($des->fecha_inicio)->translatedFormat('j F') }} -  {{\Carbon\Carbon::parse($des->fecha_fin)->translatedFormat('j F') }}
                                    </p>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">schedule</span>
                                        {{Carbon\Carbon::parse($des->hora_inicio)->format('g:i a')}} - {{Carbon\Carbon::parse($des->hora_fin)->format('g:i a')}}
                                    </p>
                                    <hr>
                            
                                </div>
                                    <div class="card-links">
                                    <div class="card-links-botones">
                                        <a target="_blank" class="link-temario" href="{{asset("temarios/$des->temario")}}">Ver temario</a>
                                    </div>
                                    <div class="d-flex">
                                        <form class="d-flex" action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                            <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                            <input type="hidden" name="curso_id" value="{{$des->id}}">
                                            <button type="submit" class="ml-4 bg-transparent border-0" title="Añadir al carrito">
                                                <span class="material-symbols-outlined">add_shopping_cart</span>
                                            </button>
                                            <span class="flip d-block" title="Ver detalles">
                                                <span class="material-symbols-outlined">more_vert</span>
                                            </span>    
                                            <!-- atras -->
                                            <div class="panel bg-light text-dark">
                                                <p class="panel-p">
                                                    <span>Antecedentes:</span> Ninguno  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Equipo:</span> Computadora con acceso a internet  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Cupo:</span> 20  
                                                </p>
                                                <h5 class="card-list_precios">Precios</h5>
                                                <p title="Alumnos, ex-alumnos y trabajadores" class="panel-p">
                                                    <span>Comunidad UNAM:</span> $600  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Estudiantes externos:</span> $800  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Ex alumnos:</span> $900  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Publico general:</span> $1000  
                                                </p>

                                                </div>
                                        </form>
                            
                                    </div>
                            
                                </div>
                            </div>
                        </div> 
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="pills-otros" role="tabpanel" aria-labelledby="pills-otros-tab">
                 <div class="row">
                    @foreach($otros as $otro)
                    <div class="col">
                         <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="card-img">
                                    <img src="{{asset('/img/logos/'.$otro->imagen)}}" alt="">
                                </div>
                                <div class="card-text">
                                    <h4 class="card-text_titulo">{{$otro->nombre}}</h4>
                                    <div class="d-none">{{setlocale(LC_ALL, 'es_ES')}}</div>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">calendar_month</span>
                                        {{\Carbon\Carbon::parse($otro->fecha_inicio)->translatedFormat('j F') }} -  {{\Carbon\Carbon::parse($otro->fecha_fin)->translatedFormat('j F') }}
                                    </p>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">schedule</span>
                                        {{Carbon\Carbon::parse($otro->hora_inicio)->format('g:i a')}} - {{Carbon\Carbon::parse($otro->hora_fin)->format('g:i a')}}
                                    </p>
                                    <hr>
                            
                                </div>
                                    <div class="card-links">
                                    <div class="card-links-botones">
                                        <a target="_blank" class="link-temario" href="{{asset("temarios/$otro->temario")}}">Ver temario</a>
                                    </div>
                                    <div class="d-flex">
                                        <form class="d-flex" action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                            <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                            <input type="hidden" name="curso_id" value="{{$otro->id}}">
                                            <button type="submit" class="ml-4 bg-transparent border-0" title="Añadir al carrito">
                                                <span class="material-symbols-outlined">add_shopping_cart</span>
                                            </button>
                                            <span class="flip d-block" title="Ver detalles">
                                                <span class="material-symbols-outlined">more_vert</span>
                                            </span>    
                                            <!-- atras -->
                                            <div class="panel bg-light text-dark">
                                                <p class="panel-p">
                                                    <span>Antecedentes:</span> Ninguno  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Equipo:</span> Computadora con acceso a internet  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Cupo:</span> 20  
                                                </p>
                                                <h5 class="card-list_precios">Precios</h5>
                                                <p title="Alumnos, ex-alumnos y trabajadores" class="panel-p">
                                                    <span>Comunidad UNAM:</span> $600  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Estudiantes externos:</span> $800  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Ex alumnos:</span> $900  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Publico general:</span> $1000  
                                                </p>

                                                </div>
                                        </form>
                            
                                    </div>
                            
                                </div>
                            </div>
                        </div> 
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="pills-matutinos" role="tabpanel" aria-labelledby="pills-matutinos-tab">
                <div class="row">
                    @foreach($AM as $matutino)
                    <div class="col">
                         <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="card-img">
                                    <img src="{{asset('/img/logos/'.$matutino->imagen)}}" alt="">
                                </div>
                                <div class="card-text">
                                    <h4 class="card-text_titulo">{{$matutino->nombre}}</h4>
                                    <div class="d-none">{{setlocale(LC_ALL, 'es_ES')}}</div>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">calendar_month</span>
                                        {{\Carbon\Carbon::parse($matutino->fecha_inicio)->translatedFormat('j F') }} -  {{\Carbon\Carbon::parse($matutino->fecha_fin)->translatedFormat('j F') }}
                                    </p>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">schedule</span>
                                        {{Carbon\Carbon::parse($matutino->hora_inicio)->format('g:i a')}} - {{Carbon\Carbon::parse($matutino->hora_fin)->format('g:i a')}}
                                    </p>
                                    <hr>
                            
                                </div>
                                    <div class="card-links">
                                    <div class="card-links-botones">
                                        <a target="_blank" class="link-temario" href="{{asset("temarios/$matutino->temario")}}">Ver temario</a>
                                    </div>
                                    <div class="d-flex">
                                        <form class="d-flex" action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                            <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                            <input type="hidden" name="curso_id" value="{{$matutino->id}}">
                                            <button type="submit" class="ml-4 bg-transparent border-0" title="Añadir al carrito">
                                                <span class="material-symbols-outlined">add_shopping_cart</span>
                                            </button>
                                            <span class="flip d-block" title="Ver detalles">
                                                <span class="material-symbols-outlined">more_vert</span>
                                            </span>    
                                            <!-- atras -->
                                            <div class="panel bg-light text-dark">
                                                <p class="panel-p">
                                                    <span>Antecedentes:</span> Ninguno  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Equipo:</span> Computadora con acceso a internet  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Cupo:</span> 20  
                                                </p>
                                                <h5 class="card-list_precios">Precios</h5>
                                                <p title="Alumnos, ex-alumnos y trabajadores" class="panel-p">
                                                    <span>Comunidad UNAM:</span> $600  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Estudiantes externos:</span> $800  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Ex alumnos:</span> $900  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Publico general:</span> $1000  
                                                </p>

                                                </div>
                                        </form>
                            
                                    </div>
                            
                                </div>
                            </div>
                        </div> 
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="pills-vespertinos" role="tabpanel" aria-labelledby="pills-vespertinos-tab">
                <div class="row">
                    @foreach($PM as $vespertino)
                    <div class="col">
                         <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="card-img">
                                    <img src="{{asset('/img/logos/'.$vespertino->imagen)}}" alt="">
                                </div>
                                <div class="card-text">
                                    <h4 class="card-text_titulo">{{$vespertino->nombre}}</h4>
                                    <div class="d-none">{{setlocale(LC_ALL, 'es_ES')}}</div>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">calendar_month</span>
                                        {{\Carbon\Carbon::parse($vespertino->fecha_inicio)->translatedFormat('j F') }} -  {{\Carbon\Carbon::parse($vespertino->fecha_fin)->translatedFormat('j F') }}
                                    </p>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">schedule</span>
                                        {{Carbon\Carbon::parse($vespertino->hora_inicio)->format('g:i a')}} - {{Carbon\Carbon::parse($vespertino->hora_fin)->format('g:i a')}}
                                    </p>
                                    <hr>
                            
                                </div>
                                    <div class="card-links">
                                    <div class="card-links-botones">
                                        <a target="_blank" class="link-temario" href="{{asset("temarios/$vespertino->temario")}}">Ver temario</a>
                                    </div>
                                    <div class="d-flex">
                                        <form class="d-flex" action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                            <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                            <input type="hidden" name="curso_id" value="{{$vespertino->id}}">
                                            <button type="submit" class="ml-4 bg-transparent border-0" title="Añadir al carrito">
                                                <span class="material-symbols-outlined">add_shopping_cart</span>
                                            </button>
                                            <span class="flip d-block" title="Ver detalles">
                                                <span class="material-symbols-outlined">more_vert</span>
                                            </span>    
                                            <!-- atras -->
                                            <div class="panel bg-light text-dark">
                                                <p class="panel-p">
                                                    <span>Antecedentes:</span> Ninguno  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Equipo:</span> Computadora con acceso a internet  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Cupo:</span> 20  
                                                </p>
                                                <h5 class="card-list_precios">Precios</h5>
                                                <p title="Alumnos, ex-alumnos y trabajadores" class="panel-p">
                                                    <span>Comunidad UNAM:</span> $600  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Estudiantes externos:</span> $800  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Ex alumnos:</span> $900  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Publico general:</span> $1000  
                                                </p>

                                                </div>
                                        </form>
                            
                                    </div>
                            
                                </div>
                            </div>
                        </div> 
                    </div>
                    @endforeach
                </div>
            </div>
              <div class="tab-pane fade" id="pills-hardware" role="tabpanel" aria-labelledby="pills-hardware-tab">
                <div class="row">
                    @foreach($hardware as $hard)
                    <div class="col">
                         <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="card-img">
                                    <img src="{{asset('/img/logos/'.$hard->imagen)}}" alt="">
                                </div>
                                <div class="card-text">
                                    <h4 class="card-text_titulo">{{$hard->nombre}}</h4>
                                    <div class="d-none">{{setlocale(LC_ALL, 'es_ES')}}</div>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">calendar_month</span>
                                        {{\Carbon\Carbon::parse($hard->fecha_inicio)->translatedFormat('j F') }} -  {{\Carbon\Carbon::parse($hard->fecha_fin)->translatedFormat('j F') }}
                                    </p>
                                    <p class="card-text_p">
                                        <span class="material-symbols-outlined">schedule</span>
                                        {{Carbon\Carbon::parse($hard->hora_inicio)->format('g:i a')}} - {{Carbon\Carbon::parse($hard->hora_fin)->format('g:i a')}}
                                    </p>
                                    <hr>
                            
                                </div>
                                    <div class="card-links">
                                    <div class="card-links-botones">
                                        <a target="_blank" class="link-temario" href="{{asset("temarios/$hard->temario")}}">Ver temario</a>
                                    </div>
                                    <div class="d-flex">
                                        <form class="d-flex" action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                            <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                            <input type="hidden" name="curso_id" value="{{$hard->id}}">
                                            <button type="submit" class="ml-4 bg-transparent border-0" title="Añadir al carrito">
                                                <span class="material-symbols-outlined">add_shopping_cart</span>
                                            </button>
                                            <span class="flip d-block" title="Ver detalles">
                                                <span class="material-symbols-outlined">more_vert</span>
                                            </span>    
                                            <!-- atras -->
                                            <div class="panel bg-light text-dark">
                                                <p class="panel-p">
                                                    <span>Antecedentes:</span> Ninguno  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Equipo:</span> Computadora con acceso a internet  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Cupo:</span> 20  
                                                </p>
                                                <h5 class="card-list_precios">Precios</h5>
                                                <p title="Alumnos, ex-alumnos y trabajadores" class="panel-p">
                                                    <span>Comunidad UNAM:</span> $600  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Estudiantes externos:</span> $800  
                                                </p>
                                                <p  title="Estudiantes de escuelas externas a la UNAM" class="panel-p">
                                                    <span >Ex alumnos:</span> $900  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Publico general:</span> $1000  
                                                </p>

                                                </div>
                                        </form>
                            
                                    </div>
                            
                                </div>
                            </div>
                        </div> 
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
