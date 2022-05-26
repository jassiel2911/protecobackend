@extends('layouts.auth')
@section('content')

<!-- @if(session('aviso.required'))
    <div class="alert bg-warning">
        <p>{{session('aviso.required')}}</p>
    </div>
@endif -->

<main class="main_auth">
  <div class="container-fluid">
    <div class="row auth-row">
      <!-- col morada -->
      <div class="col-morada col-12 col-md-5 bg-azulfuerte">
        <div class="col-morada_content">
          <a href="{{route('home')}}"><img class="auth-logo" src="{{asset('img/logo_blanco.png')}}" alt=""></a>
          <img class="auth-img" src="{{asset('img/base/register.svg')}}" alt="">
        </div>
      </div>
      <!-- col blanca -->
      <div class="col-12 col-md-7 col-blanca-reg">
        <p class="sin_cuenta-top">¿Ya tienes cuenta? <a class=" a_rosa" href="{{ route('login') }}">Inicia sesión</a></p>
          <!-- Empieza form -->
        <form class="auth-form container" method="POST" action="{{ route('register') }}">
          @csrf
          <h1 class="auth_h1 reg_h1 input-div display-6 text-rosa">Regístrate aquí</h1>
          <!-- Nombre -->
          <div class="input-div row">
            <div class="col-12 col-md-6">
              <label for="name" class="form-label">Nombre(s)*</label>
              <input  id="name" type="text" class="@error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}"  autocomplete="name">
                @error('fname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-12 col-md-6">
              <label for="name" class="form-label">Apellidos*</label>
              <input  id="lname" type="text" class="@error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}"  autocomplete="name" >
                @error('lname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          </div>
          <!-- Correo -->
          <div class="input-div">
            <label for="email" class="form-label">Correo Electrónico*</label>
            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
 
          <!-- Procedencia y género -->
          <!-- <div class="input-div row">
            <div class="col-6">
              <label for="">Procedencia*</label>
              <select class="form-select"  name="origin" id="auth-select">
                <option value="Comunidad UNAM">Comunidad UNAM</option>
                <option value="Alumno externo">Alumno externo</option>
                <option value="Publico en general">Otro</option>
              </select>
              @error('origin')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror 
            </div>
            <div class="col-6">
              <div class="row">
                <label class="col" for="">Género*</label>
              </div>
              <select class="form-select"  name="gender">
                <option value="F">Mujer</option>
                <option value="M">Hombre</option>
                <option value="X">Otro</option>
                <option value="-">Prefiero no decir</option>
              </select>
              @error('gender')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror 
            </div>
          </div> -->
          <!-- Contraseña -->
          <div class="input-div">
            <label for="password" class="form-label">Contraseña*</label>
            <div class="">
              <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
               @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror  
          </div>
          </div>
          <!-- Confirmar contraseña -->
          <div class="input-div">
            <label for="confirm-password" class="">Confirmar Contraseña*</label>
            <div>
              <input id="password-confirm" type="password" class="" name="password_confirmation"  autocomplete="new-password">
            </div>
          </div>
          <!-- Aviso de privacidad -->
          <!-- <div class="input-div form-check">
            <input class="form-check-input" type="checkbox" value="1" id="aviso" name="aviso">
            <label class="form-check-label" for="flexCheckDefault">
              He leído y acepto el <a class="a_rosa" href="">Aviso de privacidad*</a>
            </label>
            @error('aviso')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror  
          </div> -->
          <!-- Submit -->
          <div class="input-div">
            <input type="submit" class="auth-submit btn btn-rosa">
          </div>
          <p class="sin_cuenta-bottom text-end">¿Ya tienes cuenta? <a class="a_rosa" href="{{ route('login') }}">Inicia sesión</a></p>
        </form>
      </div>
    </div>
  </div>
</main>

@endsection
