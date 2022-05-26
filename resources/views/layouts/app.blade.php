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
    <link rel="stylesheet" href="{{asset('css/glider.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/mediaqueries.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">

    

</head>
<body>
    <!-- Header -->
	<header class="header header-home">
		<!-- Navbar -->
		<nav class="nav nav-home container">
			<div class="">
				<div class="d-flex">
					<a title="Programa de Tecnología en Cómputo" href="{{route('home')}}">
						<img class="nav-logo_desk d-none d-xl-block" src="{{asset('img/logo_blanco.png')}}" alt="Programa de Tecnología en Cómputo">
					</a>
					<a title="Universidad Nacional Autónoma de México" target="_blank" href="https://www.unam.mx/">
						<img id="logo-unam" class="nav-logo_desk d-none d-xl-block" src="{{asset('img/UNAM.png')}}" alt="UNAM">
					</a>
				</div>
				<a class="d-xl-none" title="Programa de Tecnología en Cómputo" href="{{route('home')}}">
					<img class="nav-logo_mob" src="{{asset('img/logo_blanco.png')}}" alt="PROTECO">
				</a>
			</div>
			<button class="nav-toggle" aria-label="Abrir menú">
				<img src="{{asset('img/menu.png')}}" alt="">
			</button>
			<!-- Menu -->
			<ul class="nav-menu nav-home_menu container">
				<li class="nav-menu_item">
					<a href="{{route('home')}}" class="nav-menu_link nav-link active" >Inicio</a>
				</li>
                <li class="nav-menu_item">
                    <a href="{{route('ver-cursos.index')}}" class="nav-menu_link nav-link" >Cursos</a>
                </li>
                <li class="nav-menu_item">
                    <a href="{{route('inscripcion')}}" class="nav-menu_link nav-link" >¿Cómo me inscribo?</a>
                </li>
                <li class="nav-menu_item">
                    <a href="{{route('convocatoria')}}" class="nav-menu_link nav-link" >Convocatoria</a>
                </li>
                @guest
                <li class="nav-menu_item menu_item-btn">
                    <a href="{{route('register')}}" class="btn-nav nav-menu_link nav-link btn-nav_amarillo_outline" id="nav-contacto">Crear cuenta</a>
                </li>
                <li class="nav-menu_item menu_item-btn">
                    <a href="{{route('login')}}" class="btn-nav nav-menu_link nav-link btn-nav_amarillo" id="nav-contacto">Iniciar sesión</a>
                </li>
                @else
				<li class="nav-menu_item">
					<a href="{{route('cart.show', auth()->user()->id)}}" class="nav-menu_link nav-link" >Carrito</a>
				</li>
					<!-- desktop -->
					<li class="nav-item dropdown nav-menu_item d-none d-xl-block">
			          <div class="dropdown-nav">
			          <button class="dropbtn d-flex justify-content-center align-items-center align-content-center">{{auth()->user()->fname}} <img class="d-block mx-2" src="img/icons/generales/flecha.png" alt="" width="20"></button>
			          <div class="dropdown-content shadow-lg">
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
                        <a class="text-white" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Cerrar sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
				<!-- botones -->
                @endguest

			</ul>
		</nav>
	</header>
    <!-- Header -->
   
    @yield('content')

    <!-- Footer -->
    <footer class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <img src="img/logo_blanco.png" class="footer-logo img-fluid" alt="">
                    <img src="img/UNAM.png" class="footer-logo img-fluid unam" alt="">
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="">Contacto</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="#">cursosproteco@gmail.com</a></li>
                        <li><a href="#">56 1839 4983</a></li>
                        <li><a href="#">Anexo Facultad Ingeniería Edificio Q "Luis G. Valdés Vallejo Laboratorio Q220, C.U., 04510 Ciudad de México, CDMX</a></li>
                    </ul>
                </div>
                <div class="redes col-lg-4 col-md-12">
                    <h5 class="">Síguenos</h5>
                   	<div class="d-flex">
                   		<a target="_blank" href="https://es-la.facebook.com/proteco/">
                   			<img src="img/fb.png" alt="">
                   		</a>
                   		<a target="_blank" href="https://www.youtube.com/c/PROTECOCursos/featured?app=desktop">
                   			<img src="img/yb.png" alt="">
                   		</a>
                   		<a target="_blank" href="https://www.instagram.com/protecounam/?hl=es">
                   			<img src="img/ig.png" alt="">
                   		</a>
                   		<a target="_blank" href="https://twitter.com/proteco?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">
                   			<img src="img/tw.png" alt="">
                   		</a>
                   		<a target="_blank" href="https://www.linkedin.com/company/proteco">
                   			<img src="img/in.png" alt="">
                   		</a>
                   	</div>
                </div>
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
