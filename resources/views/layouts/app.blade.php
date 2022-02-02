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
    <link rel="stylesheet" href="{{asset('css/styles3.css')}}">
    <link rel="stylesheet" href="{{asset('css/mediaqueries.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <link rel="shortcut icon" href="{{asset('img/icons/personales/logo.png')}}">

</head>
<body>
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
    <!-- Header -->
    <header class="header header-home">
        <!-- Navbar -->
        <nav class="nav nav-home container">
            <div class="nav-ico">
                <!-- <img class="logo ico-proteco nav-logo nav-logo_color" src="./img/icons/personales/logo_color.png" alt="PROTECO"> -->
                <div class="d-flex">
                    <a href="{{route('home')}}"><img class="logo ico-proteco nav-logo nav-logo_color" src="{{asset('img/icons/personales/logo_negro.png')}}" alt="PROTECO"></a>
                    <a href="{{route('home')}}"><img class="logo ico-proteco nav-logo nav-logo_color" src="{{asset('img/icons/personales/fi_negro.svg')}}" alt="PROTECO"></a>
                    
                </div>

                <img class="logo ico-proteco nav-logo nav-logo_blanco" src="{{asset('img/icons/personales/logo_blanco.png')}}" alt="PROTECO">
            </div>
            <button class="nav-toggle" aria-label="Abrir menú">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu nav-home_menu">
                <li class="nav-menu_item">
                    <a href="{{route('home')}}" class="nav-menu_link nav-link active" >Inicio</a>
                </li>
                <li class="nav-menu_item">
                    <a href="{{route('ver-cursos.index')}}" class="nav-menu_link nav-link" >Cursos</a>
                </li>
                <li class="nav-menu_item">
                    <a href="{{route('inscripcion')}}" class="nav-menu_link nav-link" >¿Cómo me inscribo?</a>
                </li>
                <!-- <li class="nav-menu_item">
                    <a href="#talleres-proteco" class="nav-menu_link nav-link" >Talleres</a>
                </li> -->
                <!-- <li class="nav-menu_item">
                    <a href="#asesorias-proteco" class="nav-menu_link nav-link" id="nav-asesorias">Asesorías</a>
                </li> -->
                @guest
                <li class="nav-menu_item menu_item-btn">
                    <a href="{{route('register')}}" class="nav-menu_link nav-link btn-form btn-azul-outline" id="nav-contacto">Crear cuenta</a>
                </li>
                <li class="nav-menu_item menu_item-btn">
                    <a href="{{route('login')}}" class="nav-menu_link nav-link btn-form btn-azul text-blanco" id="nav-contacto">Iniciar sesión</a>
                </li>
                @else
                    <!-- para admins -->
                    <li class="nav-menu_item">
                        <a href="{{route('cart.show', auth()->user()->id)}}" class="nav-menu_link nav-link" id="nav-contacto">Carrito</a>
                    </li>
                    <!-- @if(auth()->user()->role==2)
                    <li class="nav-menu_item">
                        <a href="{{route('admin.index')}}" class="nav-menu_link nav-link" id="nav-asesorias">Panel de administrador</a>
                    </li>
                     <li class="nav-menu_item">
                        <a href="{{route('becarios.index')}}" class="nav-menu_link nav-link" id="nav-contacto">Panel de becario</a>
                    </li>
                    @elseif(auth()->user()->role==1)
                    <li class="nav-menu_item">
                        <a href="{{route('becarios.index')}}" class="nav-menu_link nav-link" id="nav-contacto">Panel de becario</a>
                    </li>
                    @endif -->
                    <!-- desktop -->
                    <li class="nav-item dropdown nav-menu_item d-none d-md-block">
                      <div class="dropdown-nav">
                      <button class="dropbtn d-flex justify-content-center align-items-center align-content-center">{{auth()->user()->fname}} <img class="d-block mx-2" src="img/icons/generales/flecha.png" alt="" width="20"></button>
                      <div class="dropdown-content">
                        <a href="{{route('perfil.index')}}">Mi perfil</a>
                         @if(auth()->user()->role==2)
                            <a href="{{route('admin.index')}}">Administrador</a>
                            <a href="{{route('becarios.index')}}">Becario</a>
                        @elseif(auth()->user()->role==1)
                            <a href="{{route('becarios.index')}}">Becario</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Cerrar sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      </div>
                    </div>
                    </li>
                    <!-- mobile -->
                    <li class="nav-menu_item d-md-none">
                        <a href="{{route('perfil.index')}}" class="nav-menu_link nav-link" >Mi perfil</a>
                    </li>
                     @if(auth()->user()->role==2)
                        <li class="nav-menu_item d-md-none">
                            <a href="{{route('admin.index')}}" class="nav-menu_link nav-link" >Administrador</a>
                        </li>
                        <li class="nav-menu_item d-md-none">
                            <a href="{{route('becarios.index')}}" class="nav-menu_link nav-link" >Becario</a>
                        </li>
                    @elseif(auth()->user()->role==1)
                        <li class="nav-menu_item d-md-none">
                            <a href="{{route('becarios.index')}}" class="nav-menu_link nav-link" >Becario</a>
                        </li>
                    @endif
                   
                    <li class="nav-menu_item d-md-none">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Cerrar sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
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
            <div class="col-12 col-lg-4 footer-col-redes d-none d-sm-block">
                <a target="_blank" href="https://www.facebook.com/proteco">
                    <img src="{{asset('img/icons/generales/fb-azul.svg')}}" alt="">
                </a>
                <a target="_blank" href="https://www.instagram.com/protecounam/">
                    <img src="{{asset('img/icons/generales/ig-azul.svg')}}" alt="">
                </a>
                <a target="_blank" href="">
                    <img src="{{asset('img/icons/generales/tw-azul.svg')}}" alt="https://twitter.com/proteco">
                </a>
                <a target="_blank" href="">
                    <img src="{{asset('img/icons/generales/in-azul.svg')}}" alt="https://www.linkedin.com/company/proteco">
                </a>
                <a target="_blank" href="https://www.youtube.com/PROTECOCursos">
                    <img src="{{asset('img/icons/generales/yt-azul.svg')}}" alt="">
                </a>
            </div>
        </div>
    </footer>
    <!-- Messenger Plugin de chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin de chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "199785637919");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/glider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>

</body>
</html>
