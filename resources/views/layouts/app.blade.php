<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PROTECO</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediaqueries.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glider.min.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/glider.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/mediaqueries.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <link rel="shortcut icon" href="{{asset('img/icons/personales/logo.png')}}">

</head>
<body>
    
    <!-- Header -->
    <header class="header header-home">
        <!-- Navbar -->
        <nav class="nav nav-home container">
            <div class="nav-ico">
                <!-- <img class="logo ico-proteco nav-logo nav-logo_color" src="./img/icons/personales/logo_color.png" alt="PROTECO"> -->
                <div class="d-flex">
                    <img class="logo ico-proteco nav-logo nav-logo_color" src="./img/icons/personales/logo_negro.png" alt="PROTECO">
                    <img class="logo ico-proteco nav-logo nav-logo_color" src="./img/icons/personales/UNAM_logobn1.png" alt="PROTECO">
                    <!-- <img class="logo ico-proteco nav-logo nav-logo_color" src="./img/icons/personales/fi_negro.svg" alt="PROTECO"> -->
                </div>

                <img class="logo ico-proteco nav-logo nav-logo_blanco" src="img/icons/personales/logo_blanco.png" alt="PROTECO">
            </div>
            <button class="nav-toggle" aria-label="Abrir menú">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu nav-home_menu">
                <li class="nav-menu_item">
                    <a href="#proteco" class="nav-menu_link nav-link active" >Inicio</a>
                </li>
                <li class="nav-menu_item">
                    <a href="#cursos-proteco" class="nav-menu_link nav-link" >Cursos</a>
                </li>
                <li class="nav-menu_item">
                    <a href="#talleres-proteco" class="nav-menu_link nav-link" >Talleres</a>
                </li>
                <li class="nav-menu_item">
                    <a href="#asesorias-proteco" class="nav-menu_link nav-link" id="nav-asesorias">Asesorías</a>
                </li>
                <li class="nav-menu_item">
                    <a href="#contacto-proteco" class="nav-menu_link nav-link" id="nav-contacto">Contacto</a>
                </li>
                @guest
                <li class="nav-menu_item menu_item-btn">
                    <a href="{{route('register')}}" class="nav-menu_link nav-link btn-form btn-azul-outline" id="nav-contacto">Crear cuenta</a>
                </li>
                <li class="nav-menu_item menu_item-btn">
                    <a href="{{route('login')}}" class="nav-menu_link nav-link btn-form btn-azul text-blanco" id="nav-contacto">Iniciar sesión</a>
                </li>
                @else
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{auth()->user()->fname}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        @if(auth()->user()->role==2)
                            <li><a class="dropdown-item" href="{{route('admin.index')}}">Administrador</a></li>
                        @elseif(auth()->user()->role==2)
                            <li><a class="dropdown-item" href="#">Instructor</a></li>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Cerrar sesión
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                    </li>
                    
                @endguest
            </ul>
        </nav>
    </header>
   
    @yield('content')

    <!-- Footer -->
    <footer class="home-footer container-fluid" id="contacto-proteco">
        <div class="row home-footer_row">
            <div class="col-12 col-lg-4 footer-col-logo">
                <img class="img-fluid footer-logo mobile-none" src="{{asset('img/icons/personales/logo.png')}}" alt="Facultad de Ingenieria">
            </div>
            <!-- Boton de email -->
            <div class="col-12 col-lg-4 footer-col-contacto">
                <h4 class="text-azul">Contacto</h4>
                <a class="text-negro" target="_blank" href="mailto:cursosproteco@gmail.com">cursosproteco@gmail.com</a>
                <p>55 5622 3045</p>
                <p>Anexo Facultad Ingeniería Edificio Q "Luis G. Valdés Vallejo Laboratorio Q220, C.U., 04510 Ciudad de México, CDMX</p>
            </div>
            <!-- Boton de telefono -->
            <div class="col-12 col-lg-4 footer-col-redes">
                <a target="_blank" href="">
                    <img src="img/icons/generales/fb-azul.svg" alt="">
                </a>
                <a target="_blank" href="">
                    <img src="img/icons/generales/ig-azul.svg" alt="">
                </a>
                <a target="_blank" href="">
                    <img src="img/icons/generales/tw-azul.svg" alt="">
                </a>
                <a target="_blank" href="">
                    <img src="img/icons/generales/in-azul.svg" alt="">
                </a>
                <a target="_blank" href="">
                    <img src="img/icons/generales/yt-azul.svg" alt="">
                </a>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/glider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>

</body>
</html>
