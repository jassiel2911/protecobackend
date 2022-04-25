@extends('layouts.auth')

@section('content')
<main class="main_auth">
  <div class="container-fluid">
    <div class="row auth-row">
      <!-- col morada -->
      <div class="col-morada col-12 col-md-5 bg-azulfuerte">
        <div class="col-morada_content">
          <a href="{{route('home')}}"><img class="auth-logo" src="{{asset('img/logo_blanco.png')}}" alt=""></a>
          <img class="auth-img" src="{{asset('img/base/login.svg')}}" alt="">
        </div>
      </div>
      <!-- col blanca -->
      <div class="col-12 col-md-7 col-blanca-log">
          @if(session('error'))
          <div class="alert bg-azulfuerte alert-dismissible fade show text-center" role="alert">
            <p class="">Para agregar cursos a tu carrito por favor <strong class="text-rosa">inicia sesión</strong></p>
            <p>¿No tienes cuenta? <a class="text-rosa" href="{{ route('register') }}"><strong>Regístrate aquí</strong></a></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
        <p class="sin_cuenta-top">¿No tienes cuenta? <a class=" a_azul" href="{{ route('register') }}">Regístrate aquí</a></p>
        <form class="auth-form container"  method="POST" action="{{ route('login') }}">
            @csrf
          <h1 class="auth_h1 log_h1 input-div text-rosa">Inicia sesión</h1>
          <!-- Nombre -->
          <div class="input-div ">
            <label for="" class="form-label">Correo Electronico</label>
           <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <!-- Contraseña -->
          <div class="input-div">
            <label for="inputPassword" class="">Contraseña</label>
            <div class="">
               <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          <!-- Aviso de privacidad -->
          <div class="input-div form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="aviso" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckDefault">
              Recordarme</a>
            </label>
          </div>
          <!-- Submit -->
          <div class="input-div">
            <input value="Entrar" type="submit" class="auth-submit btn btn-rosa">
          </div>
        @if (Route::has('password.request'))
         <!-- <p class="text-end">¿Olvidaste tu contraseña? <a class=" a_azul" href="{{ route('password.request') }}">Click aquí</a></p> -->
        @endif
         <p class="sin_cuenta-bottom text-end">¿No tienes cuenta? <a class=" a_azul" href="{{ route('password.request') }}">Regístrate aquí</a></p>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection
