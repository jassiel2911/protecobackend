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
    

    <!-- Presentacion -->
    <section class="section-presentacion container-fluid" id="proteco">
        <div class="row presentacion container mx-auto">
            <div class="item-1 col-12 col-lg-6">
                <!-- Imagen principal -->
                <img class="img-principal img-fluid" src="./img/base/principal_1.png" alt="Explora nuestro contenido">
            </div>
            <div class="item-2 col-12 col-lg-6">
                <!-- Titulo del programa -->
                <div>
                    <h1 class="display-5">Programa de <span class="text-azul">Tecnología</span> en Cómputo</h1>
                </div>
                <!-- Texto informativo -->
                <div>
                    <p class="p p-grande">
                        En PROTECO <span>estamos para ayudarte</span> a sacar adelante tu carrera en el mundo de la computación
                    </p>
                </div>
                <!-- Boton de cursos -->
                <div class="container-btn presentacion-btn">
                    <div class="btn btn-azul"><a style="color:#fff;" href="{{route('ver-cursos.index')}}">Ver cursos</a> </div>
                </div>
            </div>
        </div>
    </section>

     <style>
        @import url("https://fonts.googleapis.com/css?family=Modak");
        .text {
            height: 200px;
            display: inline-block;
            font-size: 300px;
            line-height: 84%;
            font-family: Modak;
            padding-left: 7px;
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            text-shadow: 7px 7px 0px #d2d2d22e;
        }

        .text-1 {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='200px' height='200px' viewBox='0 0 400 400'%3e%3cdefs%3e%3cfilter id='filter' width='400px' height='400px' filterUnits='objectBoundingBox' primitiveUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3e%3cfeFlood flood-color='%23f5576c' flood-opacity='1' x='0' y='0' width='250px' height='250px' result='flood3'%3e%3c/feFlood%3e%3cfeFlood flood-color='%23f093fb' flood-opacity='1' x='150px' y='150px' width='250px' height='250px' result='flood4'%3e%3c/feFlood%3e%3cfeGaussianBlur stdDeviation='50 50' x='0%25' y='0%25' width='100%25' height='100%25' in='flood3' edgeMode='none' result='blur1'%3e%3c/feGaussianBlur%3e%3cfeGaussianBlur stdDeviation='50 50' x='0%25' y='0%25' width='100%25' height='100%25' in='flood4' edgeMode='none' result='blur2'%3e%3c/feGaussianBlur%3e%3cfeBlend mode='normal' x='0%25' y='0%25' width='100%25' height='100%25' in='blur2' in2='SourceGraphic' result='blend5'%3e%3c/feBlend%3e%3cfeBlend mode='normal' x='0%25' y='0%25' width='100%25' height='100%25' in='blur1' in2='blend5' result='blend6'%3e%3c/feBlend%3e%3c/filter%3e%3c/defs%3e%3crect width='400' height='400' x='0' y='0' fill='%23fee140' filter='url(%23filter)'%3e%3c/rect%3e%3c/svg%3e");
        }

        .text-2 {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='200px' height='200px' viewBox='0 0 400 400'%3e%3cdefs%3e%3cfilter id='filter' width='400px' height='400px' filterUnits='objectBoundingBox' primitiveUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3e%3cfeFlood flood-color='%238fd3f4' flood-opacity='1' x='0' y='0' width='250px' height='250px' result='flood3'%3e%3c/feFlood%3e%3cfeFlood flood-color='%2396e6a1' flood-opacity='1' x='150px' y='150px' width='250px' height='250px' result='flood4'%3e%3c/feFlood%3e%3cfeGaussianBlur stdDeviation='50 50' x='0%25' y='0%25' width='100%25' height='100%25' in='flood3' edgeMode='none' result='blur1'%3e%3c/feGaussianBlur%3e%3cfeGaussianBlur stdDeviation='50 50' x='0%25' y='0%25' width='100%25' height='100%25' in='flood4' edgeMode='none' result='blur2'%3e%3c/feGaussianBlur%3e%3cfeBlend mode='normal' x='0%25' y='0%25' width='100%25' height='100%25' in='blur2' in2='SourceGraphic' result='blend5'%3e%3c/feBlend%3e%3cfeBlend mode='normal' x='0%25' y='0%25' width='100%25' height='100%25' in='blur1' in2='blend5' result='blend6'%3e%3c/feBlend%3e%3c/filter%3e%3c/defs%3e%3crect width='400' height='400' x='0' y='0' fill='%23d4fc79' filter='url(%23filter)'%3e%3c/rect%3e%3c/svg%3e");
        }

        .text-3 {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='200px' height='200px' viewBox='0 0 400 400'%3e%3cdefs%3e%3cfilter id='filter' width='400px' height='400px' filterUnits='objectBoundingBox' primitiveUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3e%3cfeFlood flood-color='%23cd9cf2' flood-opacity='1' x='0' y='0' width='250px' height='250px' result='flood3'%3e%3c/feFlood%3e%3cfeFlood flood-color='%23c2e9fb' flood-opacity='1' x='150px' y='150px' width='250px' height='250px' result='flood4'%3e%3c/feFlood%3e%3cfeGaussianBlur stdDeviation='50 50' x='0%25' y='0%25' width='100%25' height='100%25' in='flood3' edgeMode='none' result='blur1'%3e%3c/feGaussianBlur%3e%3cfeGaussianBlur stdDeviation='50 50' x='0%25' y='0%25' width='100%25' height='100%25' in='flood4' edgeMode='none' result='blur2'%3e%3c/feGaussianBlur%3e%3cfeBlend mode='normal' x='0%25' y='0%25' width='100%25' height='100%25' in='blur2' in2='SourceGraphic' result='blend5'%3e%3c/feBlend%3e%3cfeBlend mode='normal' x='0%25' y='0%25' width='100%25' height='100%25' in='blur1' in2='blend5' result='blend6'%3e%3c/feBlend%3e%3c/filter%3e%3c/defs%3e%3crect width='400' height='400' x='0' y='0' fill='%2366a6ff' filter='url(%23filter)'%3e%3c/rect%3e%3c/svg%3e");
        }

        .text-4 {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='200px' height='200px' viewBox='0 0 400 400'%3e%3cdefs%3e%3cfilter id='filter' width='400px' height='400px' filterUnits='objectBoundingBox' primitiveUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3e%3cfeFlood flood-color='%230fd850' flood-opacity='1' x='0' y='0' width='250px' height='250px' result='flood3'%3e%3c/feFlood%3e%3cfeFlood flood-color='%2320E2D7' flood-opacity='1' x='80px' y='160px' width='250px' height='250px' result='flood4'%3e%3c/feFlood%3e%3cfeGaussianBlur stdDeviation='50 50' x='0%25' y='0%25' width='100%25' height='100%25' in='flood3' edgeMode='none' result='blur1'%3e%3c/feGaussianBlur%3e%3cfeGaussianBlur stdDeviation='50 50' x='0%25' y='0%25' width='100%25' height='100%25' in='flood4' edgeMode='none' result='blur2'%3e%3c/feGaussianBlur%3e%3cfeBlend mode='normal' x='0%25' y='0%25' width='100%25' height='100%25' in='blur2' in2='SourceGraphic' result='blend5'%3e%3c/feBlend%3e%3cfeBlend mode='normal' x='0%25' y='0%25' width='100%25' height='100%25' in='blur1' in2='blend5' result='blend6'%3e%3c/feBlend%3e%3c/filter%3e%3c/defs%3e%3crect width='400' height='400' x='0' y='0' fill='%23fbed96' filter='url(%23filter)'%3e%3c/rect%3e%3c/svg%3e");
        }
        .text-3x2{
            animation: beat .25s 6 alternate;
            transform-origin: center;
        }

        @keyframes beat{
            to { transform: scale(1.4); }
        }

       


    </style>

    <!-- <div class="fb-comments" data-href="https://protecounam.mx/perfil" data-width="" data-numposts="5"></div> -->

    <!-- text effect -->
    <div class="container mx-auto text-center my-5 d-none d-md-block text-3x2">
        <div class="text text-1">3</div><div class="text text-2">x</div><div class="text text-3">2</div></div>
    </div>
    <div class="container">
        <div class="alert-info p-3 my-2">
            <p>Inscribe 3 cursos y paga 2, también puedes juntarte con otros 2 amigos y hacer válida la promoción 😎</p>
            <p>En caso de aplicar con amigos, cada persona tendrá que inscribir su propio curso y una de ellas tiene que mandar correo a cursosproteco@gmail.com para notificar la situación, haremos el cambio del monto a $1000 para una persona y las otras dos serán aprobadas en automático.</p>
        </div>
    </div>

    <!-- text effect -->

    <!-- Cursos-->
    <section class="cursos-home container" id="cursos-proteco">
       

        <h2 class="text-center text-rosa">Cursos intersemestrales en línea</h2>
        <h3 class="text-center"><small>Del 10 al 28 de enero del 2022</small></h3>
        <div class="alert-info">

        </div>
        <!-- Carousel logos -->
        <div class="owl-carousel carousel-logos" id="carousel-logos">
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

          <div class="container">
            <div class="row">
                @foreach($cursos as $curso)
                <div class="col">
                    <div class="scene scene--card ">
                        <div class="cursos-card shadow-lg" id="card-t">
                            <div class="card__face card__face--front">
                                <span class="span-horario">{{$curso->turno}}</span>
                                <img class="iconos-cursos" src="{{asset('/img/logos/'.$curso->imagen)}}" alt="Java">
                                <div class="c-body">
                                    <h3 class="text-azul">{{$curso->nombre}}</h3>
                                    <div class="d-none">{{setlocale(LC_ALL, 'es_ES')}}</div>
                                    <p>{{\Carbon\Carbon::parse($curso->fecha_inicio)->translatedFormat('j F') }} - {{\Carbon\Carbon::parse($curso->fecha_fin)->translatedFormat('j F') }} </p>
                                    <p>De {{Carbon\Carbon::parse($curso->hora_inicio)->format('g:i a')}} a {{Carbon\Carbon::parse($curso->hora_fin)->format('g:i a')}} </p>
                                </div>
                                <div class="c-footer">
                                    <div class="tag bg-rosa"><small>{{$curso->cat}}</small></div>
                                    <div class="c-footer-links">
                                        <form action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                             <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                             <input type="hidden" name="curso_id" value="{{$curso->id}}">
                                            <button type="submit" class="c-footer-link d-inline border-0 bg-white" href="">
                                                <img src="{{asset('img/icons/generales/add_cart.svg')}}" alt="">
                                            </button>
                                            
                                        </form>
                                        <button class="c-footer-link card__flip">
                                            <img src="{{asset('img/icons/generales/ver_mas.svg')}}" alt="">
                                        </button>
                                     </div>
                                </div>
                            </div>
                            <div class="card__face card__face--back">
                                <div class="back-body">
                                    <details>
                                      <summary><b>Antecedentes: </b></summary>
                                      <p>{{$curso->antecedentes}}</p>
                                    </details>
                                    <details>
                                      <summary><b>Equipo: </b></summary>
                                      <p>{{$curso->equipo}}</p>
                                    </details>
                                    <p class="p"><span>Cupo:</span> {{$curso->cupo}}</p>
                                    <hr>
                                    <p class="p-grande text-center text-azul">Precios</p>
                                    <p class="p"><span>Comunidad UNAM:</span> $500</p>
                                    <p class="p"><span>Alumnos externos:</span> $600</p>
                                    <p class="p"><span>Público general:</span> $700</p>
                                </div>
                                <div class="back-footer">
                                    <div class="back-footer-links">
                                        <a target="_blank" class="text-azul" href="{{asset("temarios/$curso->temario")}}">Ver temario</a>
                                        <button class="c-footer-link card__flip">
                                            <img src="{{asset('img/icons/generales/ver_mas.svg')}}" alt="" width="30">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div><br><br><br>
            <a class="d-block text-center text-rosa btn btn-rosa btn-min" href="{{route('ver-cursos.index')}}">Ver todos</a>

            <div class="container-fluid my-5">
                <div class="row">
                    <div class="col-12 col-md-6 my-1">
                        <img src="{{asset('img/base/1.svg')}}" alt="" class="img-fluid mx-2">
                    </div>
                    <div class="col-12 col-md-6 my-1">
                        <img src="{{asset('img/base/2.svg')}}" alt="" class="img-fluid mx-2">
                    </div>
                </div>
            </div>
            


        </div>
        <!-- Aprende con nosotros -->
        <div class="home-aprende">
            <img class="img-fluid mobile-none" src="img/base/cursos.svg" alt="">
            <div class="home-aprende-2">
                <h2 class="text-azul">Aprende con nosotros</h2>
                <!-- <p>Lorem ipsum dolor, sit amet consectetur, adipisicing elit.</p> -->
                <!-- Collapse con hover -->
                <div class="home-aprende_cards">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- Collapse 1 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <button class="card aprende_cards shadow-sm" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <img class="img-fluid" src="img/icons/generales/videocall-rosa.png" alt="">
                                    <p>15 horas de clases en vivo</p>
                                    <img class="aprende-cards_flecha" src="img/icons/generales/flecha.png" alt="">
                                </button>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <p>Las clases se imparten vía Zoom <img class="img-fluid" src="img/icons/generales/zoom.svg" alt=""> y son grabadas para que puedas acceder cuando tú quieras</p>
                                </div>
                            </div>
                        </div>
                        <!-- Collapse 2 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <button class="card aprende_cards shadow-sm collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <img class="img-fluid" src="img/icons/generales/icons8-diploma-1-64.png" alt="">
                                    <p>Constancia al finalizar</p>
                                    <img class="aprende-cards_flecha" src="img/icons/generales/flecha.png" alt="">
                                </button>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <p>Constancia digital firmada por autoridades del departamento de Computación de la Facultad de Ingeniería para aquellos que acrediten con calificación mayor o igual a 8.</p>
                                    <img class="img-fluid" src="img/publicaciones/constancia.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- Collapse 3 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <button class="card aprende_cards shadow-sm collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <img class="img-fluid" src="img/icons/generales/videocall-rosa.png" alt="">
                                    <p>Atención personalizada</p>
                                    <img class="aprende-cards_flecha" src="img/icons/generales/flecha.png" alt="">

                                </button>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <p><span class="text-bold">¡Estamos para ayudarte! </span>Nos caracterizamos por brindar un servicio de calidad llevando en alto el nombre y los valores de la Máxima Casa de Estudios.</p>
                                    <img src="img/base/biblio.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Talleres -->
    <section class="home-talleres " id="talleres-proteco">
        <div class="container">
            <div class="talleres-perdiste">
                <h2 class="text-center text-rosa">Talleres gratuitos</h2>
                <p class="text-center"><a class="text-rosa" target="_blank" href="https://www.youtube.com/c/PROTECOCursos/channels">Suscríbete</a> a nuestro canal de Youtube y repítelos cuando quieras</p>
                <script src="https://apis.google.com/js/platform.js"></script>
                <div class="mx-auto text-center">
                    <div class="g-ytsubscribe" data-channelid="UCSEngCSxjHdCDFxK-gzwsxw" data-layout="full" data-count="hidden"></div>
                </div>
                <br>
                <div class="talleres-perdiste_iframe iframe-responsive-yt">
                    <iframe  src="https://www.youtube.com/embed/HLSttnSxiFA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Asesorias queda pendiente -->
    <!-- <section class="home-asesorias">
        <div class="banner-asesorias bg-lavanda">
            <div class="">
                <h3 class=""></h3>
                <h2 class="text-center">¿Necesitas ayuda? <span class="text-rosa"> Asesorías gratuitas</span></h2>
                <p>PROTECO está para ayudarte y ponemos a tu disposición nuestras asesorías gratuitas de programación donde te ofrecemos un espacio de 30 minutos para ayudarte a resolver tus dudas.</p>
            </div>
            <div class="video-asesorias">
                <iframe  src="https://www.youtube.com/embed/LABgLlfEGNA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </section> -->



</main>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v12.0&appId=141494142548039&autoLogAppEvents=1" nonce="NPEojcg3"></script>
@endsection
