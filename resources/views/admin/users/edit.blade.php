@extends('layouts.admin')

@section('content')
 <main>
  <section class="container mt-5">
   <a href="{{route('admin.index')}}">Regresar</a><br><br>
    <h1 class="text-rosa">Editar usuario</h1><br>
    <form class="edit-form container ml-auto" action="{{route('admin.update', $user->id)}}" method="POST">
        @csrf
        @method('PATCH')
      <!-- Nombre -->
      <div class="input-div row">
        <div class="col-6">
          <label for="name" class="form-label">Nombre(s)</label>
          <input name="fname" type="text" placeholder="" value="{{$user->fname}}">
        </div>
        <div class="col-6">
          <label for="name" class="form-label">Apellidos</label>
          <input name="lname" type="text" placeholder="" value="{{$user->lname}}">
        </div>
      </div>
      <!-- Correo -->
      <div class="input-div">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input name="email" type="email" value="{{$user->email}}">
      </div>
      <!-- Procedencia y género -->
      <div class="input-div row">
        <div class="col-6">
          <label for="">Procedencia</label>
          <select class="form-select" name="origin" id="auth-select">
            <option value="Comunidad UNAM"  {{ $user->origin == 'Comunidad UNAM' ? 'selected' : '' }}>Comunidad UNAM</option>
            <option value="Alumno externo"  {{ $user->origin == 'Alumno externo' ? 'selected' : '' }}>Alumno externo</option>
            <option value="Publico en general"  {{ $user->origin == 'Publico en general' ? 'selected' : '' }}>Otro</option>
          </select>
        </div>
        <div class="col-6">
          <div class="row">
            <label class="col" for="">Género</label>
          </div>
          <select class="form-select" name="gender">
           <option value="F"  {{ $user->gender == 'F' ? 'selected' : '' }}>Mujer</option>
            <option value="M"  {{ $user->gender == 'M' ? 'selected' : '' }}>Hombre</option>
            <option value="X"  {{ $user->gender == 'X' ? 'selected' : '' }}>Otro</option>
            <option value="-"  {{ $user->gender == '-' ? 'selected' : '' }}>Prefiero no decir</option>
          </select>
        </div>
      </div> 
      <div class="col-6">
          <div class="row">
            <label class="col" for="">Rol</label>
          </div>
          <select class="form-select" name="gender">
           <option value="0"  {{ $user->role == '0' ? 'selected' : '' }}>Asistente</option>
            <option value="1"  {{ $user->role == '1' ? 'selected' : '' }}>Becario(a)</option>
            <option value="2"  {{ $user->role == '2' ? 'selected' : '' }}>Administrador(a)</option>
          </select>
        </div><br>
      <!-- Submit -->
      <div class="input-div">
        <input type="submit" class="auth-submit btn btn-rosa" value="Actualizar">
      </div>
      <p class="sin_cuenta-bottom text-end">¿Ya tienes cuenta? <a class="a_rosa" href="">Inicia sesión</a></p>
    </form>
  </section>
</main>
@endsection