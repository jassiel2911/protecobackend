@extends('layouts.auth')

@section('content')
<main class="main_auth">
  <div class="container-fluid">
    <div class="row auth-row">
      <!-- col morada -->
      <div class="col-morada col-12 col-md-5 bg-lavanda">
        <div class="col-morada_content">
          <img class="auth-logo" src="{{asset('img/base/logo-bn.png')}}" alt="">
          <img class="auth-img" src="{{asset('img/base/login.svg')}}" alt="">
        </div>
      </div>
      <!-- col blanca -->
      <div class="col-12 col-md-7 col-blanca-log">
        <p class="sin_cuenta-top">¿No tienes cuenta? <a class=" a_azul" href="{{ route('register') }}">Regístrate aquí</a></p>
        <form class="auth-form container"  method="POST" action="{{ route('login') }}">
            @csrf
          <h1 class="auth_h1 log_h1 input-div text-azul">Inicia sesión</h1>
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
            <input value="Entrar" type="submit" class="auth-submit btn btn-azul">
          </div>
        @if (Route::has('password.request'))
         <p class="text-end">¿Olvidaste tu contraseña? <a class=" a_azul" href="{{ route('password.request') }}">Click aquí</a></p>
        @endif
         <p class="sin_cuenta-bottom text-end">¿No tienes cuenta? <a class=" a_azul" href="{{ route('password.request') }}">Regístrate aquí</a></p>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection
