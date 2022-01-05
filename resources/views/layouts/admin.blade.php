<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PROTECO</title>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>


    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediaqueries.css') }}" rel="stylesheet">
</head>
<body>
  <!-- Header -->
  <header class="header header-home">
      <!-- Navbar -->
      <nav class="nav nav-home container">
          <div class="nav-ico">
              <!-- <img class="logo ico-proteco nav-logo nav-logo_color" src="./img/icons/personales/logo_color.png" alt="PROTECO"> -->
              <div class="d-flex">
                  <img class="logo ico-proteco nav-logo nav-logo_color" src="{{asset('img/icons/personales/logo_negro.png')}}" alt="PROTECO">
                  <img class="logo ico-proteco nav-logo nav-logo_color" src="{{asset('img/icons/personales/UNAM_logobn1.png')}}" alt="PROTECO">
                  <!-- <img class="logo ico-proteco nav-logo nav-logo_color" src="./img/icons/personales/fi_negro.svg" alt="PROTECO"> -->
              </div>

              <img class="logo ico-proteco nav-logo nav-logo_blanco" src="img/icons/personales/logo_blanco.png" alt="PROTECO">
          </div>
          <button class="nav-toggle" aria-label="Abrir menú">
              <i class="fas fa-bars"></i>
          </button>
          <ul class="nav-menu nav-home_menu">
              <li class="nav-menu_item">
                  <a href="{{route('home')}}" class="nav-menu_link nav-link " >Inicio</a>
              </li>
              <li class="nav-menu_item">
                  <a href="{{route('admin.index')}}" class="nav-menu_link nav-link" >Usuarios</a>
              </li>
              <li class="nav-menu_item">
                  <a href="{{route('cursos.index')}}" class="nav-menu_link nav-link" >Cursos</a>
              </li>
            <li class="nav-menu_item">
                  <a href="{{route('admintickets.index')}}" class="nav-menu_link nav-link" id="nav-asesorias">Tickets</a>
              </li>
              <li class="nav-menu_item">
                  <a href="#asesorias-proteco" class="nav-menu_link nav-link" id="nav-asesorias">Reporte</a>
              </li>
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->fname}}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Perfil</a></li>
                  @if(auth()->user()->role==2)
                      <li><a class="dropdown-item" href="{{route('admin.index')}}">Administrador</a></li>
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
          </ul>
      </nav>
  </header>
  @yield('content')
</body>
</html>
