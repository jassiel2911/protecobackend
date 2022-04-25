@extends('layouts.app')

@section('content')
<main>
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" >
      Launch demo modal
    </button> -->

    <!-- Modal -->

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Muestra un mensaje que indica que el curso ya está en el carrito. -->
    <!-- @if(session('mistake'))
        <div class="alert bg-lavanda alert-dismissible fade show text-center" role="alert">
            <p class="">{{session('mistake')}}</p>
        </div>
    @endif -->
    @if(session('success'))
        <script>
        window.onload = function() {
            var element = document.getElementById("carousel-logos");
            element.scrollIntoView();
        };
        </script>
        <div class="modal fade show d-block justify-content-center align-content-center align-items-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0,0,0,.5)">
            <div class="modal-dialog">
                <div class="modal-content">
                @if(session('success')==1)
                <div class="alert alert-warning fade show" role="alert">
                    <p>Este curso ya está en tu carrito ;)</p>
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
                                    <p style="margin:0; padding-right:8px;" class="text-start">$600</p>
                                    <p class="d-none">{{$subtotal = $subtotal + 600}}</p>
                                    @if($loop->index == 2 || $loop->index == 5 || $loop->index == 8)
                                    
                                    @else
                                    <p class="d-none">{{$total = $total + 600}}</p>
                                    @endif
                                @elseif(auth()->user()->origin == "Alumno externo")
                                    <p style="margin:0; padding-right:8px;" class="text-start">$700</p>
                                    <p class="d-none">{{$subtotal = $subtotal + 700}}</p>
                                    @if($loop->index == 2 || $loop->index == 5 || $loop->index == 8)
                                    
                                    @else
                                    <p class="d-none">{{$total = $total + 700}}</p>
                                    @endif
                                @elseif(auth()->user()->origin == "Publico en general")
                                    <p style="margin:0; padding-right:8px;" class="text-start">$800</p>
                                    <p class="d-none">{{$subtotal = $subtotal + 800}}</p>
                                    @if($loop->index == 2 || $loop->index == 5 || $loop->index == 8)
                                    
                                    @else
                                    <p class="d-none">{{$total = $total + 800}}</p>
                                    @endif
                                @endif
                                <form action="{{route('cart.destroy',$cart->curso_id)}}" method="POST">
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
                        @if($i>0)
                        <form action="{{route('ticketsficha.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="total" value="{{$total}}">
                            <a type="button" class="d-inline-block btn btn-amarillo" href="{{route('cart.show', auth()->user()->id)}}">Ver carrito</a>
                            <button type="submit" class="d-inline-block btn btn-rosa">Generar ticket</button>
                        </form>
                        @endif
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
    

    <!-- Presentacion -->
    <section class="home-landing">
        <div class="container">
            <div class="home-landing_img">
                <img class="img-fluid" src="img/Software code testing-bro.png" alt="">
            </div>
            <div class="home-landing_text">
                <h1 class="landing_text_titulo1">Programa de <span><b>Tecnología</b></span> en Cómputo</h1>
                <p class="landing_text_p">A través de nuestros cursos, talleres y asesorías, te ayudamos a crecer en el mundo de la computación.</p>
                <div class="landing_text_botones">
                    <a href="#cursos" class="btn btn-rosa landing-btn">Ver cursos</a>
                </div>
            </div>
        </div>
    </section>
    
    <div class="home-logos container">
			<!-- Carousel logos -->
			<div class="owl-carousel carousel-logos">
				<!-- Python -->
				<div><img class="padding-logo" src="./img/icons/carousel/python.svg" alt="Python" title="Python"> </div>
				<!-- C -->
				<div> <img class="" src="./img/icons/carousel/c.svg" alt="Lenguaje C"  title="Lenguaje C"> </div>
				<!-- AWS -->
				<div><img class="" src="./img/icons/carousel/aws.svg" alt="Amazon Web Services"  title="Amazon Web Services"></div>
				<!-- Arduino -->
				<div><img class="" src="./img/icons/carousel/arduino.svg" alt="Arduino"  title="Arduino"></div>
				<!-- HTML -->
				<div> <img class="" src="./img/icons/carousel/html.svg" alt="HTML"  title="HTML 5"> </div>
				<!-- Excel -->
				<div> <img class="" src="./img/icons/carousel/excel.svg" alt="Excel"  title="Excel"> </div>
				<!-- Java -->
				<div> <img class="padding-logo" src="./img/icons/carousel/java.svg" alt="Java"  title="Java"> </div>
				<!-- C++ -->
				<div> <img class="" src="./img/icons/carousel/cpp.svg" alt="Lenguaje C++"  title="C++"> </div>
				<!-- machine learning -->
				<div><img class="" src="./img/icons/carousel/machine-learning.svg" alt="Machine Learning"  title="Machine Learning"></div>
				<!-- My SQL -->
				<div> <img class="" src="./img/icons/carousel/mysql.svg" alt="Mysql"  title="MySQL"> </div>
				<!-- latex -->
				<div><img class="" src="./img/icons/carousel/latex.svg" alt="latex"  title="LaTeX"></div>
				<!-- R -->
				<div><img class="" src="./img/icons/carousel/r.svg" alt="R"  title="R"></div>
				<!-- CSS -->
				<div> <img class="" src="./img/icons/carousel/css.svg" alt="CSS"  title="CSS3"> </div>
				<!-- bases de datos -->
				<div><img class="padding-logo" src="./img/icons/carousel/db.svg" alt="Bases de Datos"  title="Bases de Datos"></div>
			</div>
	</div>
    
    
    <!-- Cursos-->
    <section class="home-cursos" id="cursos-proteco">
        <div class="container">
            <h2 class="home-subtitulo">Próximos cursos</h2>
            <p>*En línea</p>
            <div class="alert-info">
            </div>
        
            <!-- Cursos -->
            <div class="home-cursos-cards">
                @foreach($cursos as $curso)
                <div class="card">
                        <div class="card-body">
                            <div class="card-img">
                                <img src="img/C.png" alt="">
                            </div>
                            <div class="card-text">
                                <h3 class="card-text_titulo">{{$curso->nombre}}</h3>
                                <div class="d-none">{{setlocale(LC_ALL, 'es_ES')}}</div>
                                <p class="card-text_p">
                                    <span class="material-symbols-outlined">calendar_month</span>
                                    {{\Carbon\Carbon::parse($curso->fecha_inicio)->translatedFormat('j F') }} -  {{\Carbon\Carbon::parse($curso->fecha_fin)->translatedFormat('j F') }}
                                </p>
                                <p class="card-text_p">
                                    <span class="material-symbols-outlined">schedule</span>
                                    {{Carbon\Carbon::parse($curso->hora_inicio)->format('g:i a')}} - {{Carbon\Carbon::parse($curso->hora_fin)->format('g:i a')}}
                                </p>
                                <hr>
                                <div class="card-links">
                                    <div class="card-links-botones">
                                        <a target="_blank" class="link-temario" href="{{asset("temarios/$curso->temario")}}">Ver temario</a>
                                    </div>
                                    <div class="d-flex">
                                        <form class="d-flex" action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                            <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                            <input type="hidden" name="curso_id" value="{{$curso->id}}">
                                            <button type="submit" class="ml-4 bg-transparent border-0" title="Añadir al carrito">
                                                <span class="material-symbols-outlined">add_shopping_cart</span>
                                            </button>
                                            <span class="flip d-block">
                                                <span class="material-symbols-outlined">more_vert</span>
                                            </span>    
                                            <!-- atras -->
                                            <div class="panel">
                                                <p class="panel-p">
                                                    <span>Antecedentes:</span> Ninguno  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Equipo:</span> Computadora con acceso a internet  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Cupo:</span> 20  
                                                </p>
                                                <h4 class="card-list_precios text-rosa">Precios</h4>
                                                <p class="panel-p">
                                                    <span>Comunidad UNAM:</span> $600  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Alumnos externos:</span> $700  
                                                </p>
                                                <p class="panel-p">
                                                    <span>Publico general:</span> $800  
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
            <!-- <a class="d-block text-center text-rosa btn btn-rosa btn-min" href="{{route('ver-cursos.index')}}">Ver todos</a> -->
        </div>
    </section>

    <section class="aprende">
        <h2 class="home-subtitulo">¿Por qué tomar cursos con nosotros?</h2>
        <div class="container">
            <img class="img-fluid" src="img/cursos.svg" alt="">

            <!-- accordion -->
            <div class="accordion">
                <section class="accordion-item ">
                    <div class="accordion-pill">
                        <span class="material-symbols-outlined">devices</span>
                        <p>15 horas de clases en vivo</p>
                        <span class="aprende-cards_flecha material-symbols-outlined">keyboard_arrow_up</span>
                    </div>
                    <div class="accordion-item-content">
                      <p>Las clases se imparten vía Zoom y son grabadas para que puedas acceder cuando tú quieras. <img src="img/zoom.svg" alt=""></p>
                    </div>
                </section>
                <section class="accordion-item">
                    <div class="accordion-pill">
                        <span class="material-symbols-outlined">workspace_premium</span>
                        <p>Constancia al finalizar</p>
                        <span class="aprende-cards_flecha material-symbols-outlined">keyboard_arrow_up</span>
                    </div>
                    <div class="accordion-item-content">
                      <p>Constancia digital firmada por autoridades del departamento de Computación de la Facultad de Ingeniería para aquellos que acrediten con calificación mayor o igual a 8. <img class="img-fluid mt-5" src="img/constancia.svg" alt=""></p>
                    </div>
                </section>
                <section  class="accordion-item">
                    <div class="accordion-pill">
                        <span class="material-symbols-outlined">face</span>
                        <p>Atención personalizada</p>
                        <span class="aprende-cards_flecha material-symbols-outlined">keyboard_arrow_up</span>
                    </div>
                    <div class="accordion-item-content">
                      <p><b>¡Estamos para ayudarte!</b> Nos caracterizamos por brindar un servicio de calidad llevando en alto el nombre y los valores de la Máxima Casa de Estudios. <img src="img/biblio.jpg" class="img-fluid mt-5" alt=""></p>
                    </div>
                </section>
                <section class="accordion-item">
                    <div class="accordion-pill">
                        <span class="material-symbols-outlined">videocam</span>
                        <p>Clases grabadas</p>
                        <span class="aprende-cards_flecha material-symbols-outlined">keyboard_arrow_up</span>
                    </div>
                    <div class="accordion-item-content">
                      <p>¿No pudiste asistir a la clase? No te preocupes, todas las sesiones se graban para que la revises cuando tu quieras.</p>
                    </div>
                </section>
            </div>

        </div>
    </section>

    <section class="talleres">
        <h2 class="home-subtitulo">Talleres gratuitos</h2>
        <p>Cada semana ofrecemos talleres de 2 horas completamente gratis. ¡No te los pierdas!</p>
        <div id="carouselExampleIndicators" class="carousel carousel-fade" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div>
                <img src="img/Talleres/T025_ Introducción a Java Script.png" class="d-block" alt="...">
                <a class="btn btn-rosa" target="_blank" href="https://linktr.ee/proteco">Registrate aquí</a>
              </div>
            </div>
            <div class="carousel-item">
              <div>
                <img src="img/Talleres/T026_ Manejo de archivos en Python.png" class="d-block" alt="...">
                <a class="btn btn-rosa" target="_blank" href="https://linktr.ee/proteco">Registrate aquí</a>
              </div>
            </div>
            <div class="carousel-item">
              <div>
                <img src="img/Talleres/T027_ Introducción a la criptografía.png" class="d-block" alt="...">
                <a class="btn btn-rosa" target="_blank" href="https://linktr.ee/proteco">Registrate aquí</a>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </section>

    


</main>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v12.0&appId=141494142548039&autoLogAppEvents=1" nonce="NPEojcg3"></script>
@endsection
