@extends('layouts.app')

@section('content')
<main>

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
                    <div class="btn btn-azul">Ver cursos</div>
                </div>
            </div>
        </div>
    </section>


    <!-- Cursos-->
    <section class="cursos-home container" id="cursos-proteco">
        <h2 class="text-center text-rosa">Cursos intersemestrales</h2>
        <h3 class="text-center"><small>Del 10 al 28 de enero del 2022</small></h3>
			
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

        <!-- <div class="carousel__cursos">
            <div class="carousel__contenedor">
                <button aria-label="Anterior" class="carousel__anterior">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="carousel__lista">					
                    <div class="scene scene--card">
                        <div class="cursos-card" id="card-t">
                            <div class="card__face card__face--front">
                                <img class="iconos-cursos" src="./img/icons/carousel/java.svg" alt="Java">
                                <div class="c-body">
                                    <h3 class="text-azul">Java Básico</h3>
                                    <p>Del 20 al 25 de agosto</p>
                                    <p>14:00 a 16:00 hrs</p>
                                </div>
                                <div class="c-footer">
                                    <div class="tag"><small>Programación</small></div>
                                    <div class="c-footer-links">
                                        <a class="c-footer-link" href="">
                                            <img src="img/icons/generales/carrito_compras.png" alt="">
                                        </a>
                                        <button class="c-footer-link card__flip">
                                            <img src="img/icons/generales/menu_puntos.png" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card__face card__face--back">
                                <div class="back-body">
                                    <p class="p"><span>Antecedentes:</span> Ninguno</p>
                                    <p class="p"><span>Equipo:</span> Computadora propia</p>
                                    <p class="p"><span>Días:</span> Lunes a Viernes</p>
                                    <hr>
                                    <p class="p-grande text-center text-azul">Precios</p>
                                    <p class="p"><span>Comunidad UNAM:</span> $300</p>
                                    <p class="p"><span>Alumnos externos:</span> $600</p>
                                    <p class="p"><span>Público general:</span> $800</p>
                                </div>
                                <div class="back-footer">
                                    <div class="back-footer-links">
                                        <a class="text-azul" href="">Ver temario</a>
                                        <button class="c-footer-link card__flip">
                                            <img src="img/icons/generales/menu_puntos.png" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="scene scene--card">
                        <div class="cursos-card" id="card-t">
                            <div class="card__face card__face--front">
                                <img class="iconos-cursos" src="./img/icons/tecnologias/python.png" alt="Java">
                                <div class="c-body">
                                    <h3 class="text-azul">Python Básico</h3>
                                    <p>Del 20 al 25 de agosto</p>
                                    <p>14:00 a 16:00 hrs</p>
                                </div>
                                <div class="c-footer">
                                    <a class="c-footer-link" href="">
                                        <img src="img/icons/generales/carrito_compras.png" alt="">
                                    </a>
                                    <button class="c-footer-link card__flip">
                                        <img src="img/icons/generales/menu_puntos.png" alt="">
                                    </button>
                                </div>
                            </div>
                            <div class="card__face card__face--back">
                                <div class="back-body">
                                    <p class="p"><span>Antecedentes:</span> Ninguno</p>
                                    <p class="p"><span>Equipo:</span> Computadora propia</p>
                                    <p class="p"><span>Días:</span> Lunes a Viernes</p>
                                    <hr>
                                    <p class="p-grande text-center text-azul">Precios</p>
                                    <p class="p"><span>Comunidad UNAM:</span> $300</p>
                                    <p class="p"><span>Alumnos externos:</span> $600</p>
                                    <p class="p"><span>Público general:</span> $800</p>
                                </div>
                                <div class="back-footer">
                                    <a class="text-azul" href="">Ver temario</a>
                                    <button class="c-footer-link card__flip">
                                        <img src="img/icons/generales/menu_puntos.png" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>			
                <button aria-label="Siguiente" class="carousel__siguiente">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
			
            <div role="tablist" class="carousel__indicadores"></div>
        </div>	 -->

        <div class="container">
            <div class="row">
                @foreach($cursos as $curso)
                <div class="col">
                    <div class="scene scene--card ">
                        <div class="cursos-card shadow-lg" id="card-t">
                            <div class="card__face card__face--front">
                                <img class="iconos-cursos" src="{{asset('/img/logos/'.$curso->imagen)}}" alt="Java">
                                <div class="c-body">
                                    <h3 class="text-azul">{{$curso->nombre}}</h3>
                                    <p>Del {{$curso->fecha_inicio}} </p>
                                    <p>al {{$curso->fecha_fin}} </p>
                                    <hr>
                                    <p>Del {{$curso->hora_inicio}} </p>
                                    <p>al {{$curso->hora_fin}} </p>
                                    <br>
                                </div>
                                <div class="c-footer">
                                    <div class="tag"><small>{{$curso->cat}}</small></div>
                                    <div class="c-footer-links">
                                        <a class="c-footer-link" href="">
                                            <img src="img/icons/generales/carrito_compras.png" alt="">
                                        </a>
                                        <button class="c-footer-link card__flip">
                                            <img src="img/icons/generales/menu_puntos.png" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card__face card__face--back">
                                <div class="back-body">
                                    <p class="p"><span>Antecedentes:</span> {{$curso->antecedentes}}</p>
                                    <p class="p"><span>Equipo:</span>{{$curso->equipo}}</p>
                                    <p class="p"><span>Días:</span> {{$curso->dias}}</p>
                                    <hr>
                                    <p class="p-grande text-center text-azul">Precios</p>
                                    <p class="p"><span>Comunidad UNAM:</span> ${{$curso->precio_unam}}</p>
                                    <p class="p"><span>Alumnos externos:</span> ${{$curso->precio_ext}}</p>
                                    <p class="p"><span>Público general:</span> ${{$curso->precio_gral}}</p>
                                </div>
                                <div class="back-footer">
                                    <div class="back-footer-links">
                                        <a class="text-azul" target="_blank" href="{{asset('/temarios/'.$curso->temario)}}">Ver temario</a>
                                        <button class="c-footer-link card__flip">
                                            <img src="img/icons/generales/menu_puntos.png" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div><br>
            <a class="d-block text-center text-rosa" href="">Ver todos</a>
        </div>

			
            <!-- Formulario -->
        <!-- <div class="cursos-primero shadow-lg">
            <div class="row ">
                <div class="col-12 col-md-6 cursos-primero-1">
                    <h2 class="text-azul">¡Que no se te pase!</h2>
                    <p>Deja tus datos y te avisaremos cuando ya puedas inscribirte</p>
                </div>
                <div class="col-12 col-md-6">
                    <form action="https://gmail.us20.list-manage.com/subscribe/post-json?u=3ce5fa55df0328a32522988cb&amp;id=bf7486b954" method="post" id="form-proximamente-cursos" name="mc-embedded-subscribe-form" class="form-cursos validate" target="_blank" novalidate>
                        <div class="row">
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" name="FNAME">
                            </div>
                            <div class="col-12">
                                <input type="email" class="form-control" placeholder="Correo electrónico" aria-label="Correo electrónico" name="EMAIL">
                            </div>
                        </div>
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>   
                        <input type="hidden" value="Cursos próximamente" name="FORM">
                        <button class="btn-form btn-azul" type="submit" name="subscribe" id="submit-prox">Enviar</button>
                        <p id="listo-prox" class="text-end text-rosa d-none">¡Listo! Mantente al pendiente de tu correo</p>
                        <div id="subscribe-result-proximamente-cursos"></div>
                    </form>
                </div>
            </div>
        </div> -->
    </section>

    <section class="generacion42 bg-azul">
        <h2 class="h2-grande text-blanco">¿Quieres formar parte?</h2>
        <p class="p-grande text-blanco">Aprende, prepárate y comparte tus conocimientos</p>
        <p class="p-grande text-blanco">Próximamente</p>
        <p class="display-5" id="timer"></p>
    </section>

    <!-- Talleres -->
    <section class="home-talleres " id="talleres-proteco">
        <div class="">
            <div class="container talleres-gratuitos">
                <h2 class="text-center text-rosa">Talleres gratuitos</h2>
                <p class="text-center">¿Aún no estás seguro? Asiste a nuestros talleres gratuitos, aprende algo nuevo, practica y convéncete de que <span class="text-rosa text-bold">somos tu mejor opción</span></p>
                <!-- Carousel logos -->
                <div class="owl-carousel carousel-talleres">
                    <div class="item-carousel-talleres">
                        <img class="img-carousel-talleres" src="img/publicaciones/talleres/graficosNumpy.svg" alt="">
                        <a target="_blank" class="btn-carousel btn-lavanda" href="https://zoom.us/meeting/register/tJIpceqorj8pE9GhhYNIV38rpkA5wHYz3Zqn">Regístrate aquí</a>
                    </div>
                    <div class="item-carousel-talleres">
                        <img class="img-carousel-talleres" src="img/publicaciones/talleres/apuntadores.svg" alt="">
                        <a target="_blank" class="btn-carousel btn-lavanda" href=" https://zoom.us/meeting/register/tJ0ofuuorD4rGtzAscZce-VGfO4cdCJWBiHx ">Regístrate aquí</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="talleres-perdiste">
                <h3 class="text-center text-azul">¿Te perdiste alguno?</h3>
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
@endsection
