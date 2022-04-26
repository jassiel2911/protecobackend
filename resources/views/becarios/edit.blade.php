@extends('layouts.admin')

@section('content')
 <main>
  <section class="container mt-5">
   <a href="{{route('becarios.index')}}">Regresar</a><br><br>
    <h1 class="text-rosa text-center">Editar curso</h1><br>

    @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form class="container w-75" action="{{route('becarios.update', $curso->id)}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
      <!-- Nombre -->
      <div class="input-div row">
        <div class="col-4">
          <label for="name" class="form-label">Nombre</label>
          <input name="nombre" type="text" placeholder="" value="{{$curso->nombre}}">
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Fecha de inicio</label>
          <input name="fecha_inicio" type="date" placeholder="" value="{{$curso->fecha_inicio}}">
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Fecha de termino</label>
          <input name="fecha_fin" type="date" placeholder="" value="{{$curso->fecha_fin}}">
        </div>
      </div>
    <div class="input-div row">
        <!-- <div class="col-4">
          <label for="name" class="form-label">Días</label>
          <input name="dias" type="string" placeholder="" >
        </div> -->
        <div class="col-4">
          <label for="name" class="form-label">Antecedentes</label>
          <input name="antecedentes" type="string" placeholder="" value="{{$curso->antecedentes}}">
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Hora inicio</label>
          <input name="hora_inicio" type="time" placeholder="" value="{{$curso->hora_inicio}}">
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Hora término</label>
          <input name="hora_fin" type="time" placeholder=""  value="{{$curso->hora_fin}}">
        </div>
        
      </div>
     <div class="input-div row">
        
        <div class="col-4">
          <label for="name" class="form-label">Equipo</label>
          <input name="equipo" type="string" placeholder=""  value="{{$curso->equipo}}">
        </div>
        <div class="col-4">
            <label for="name" class="form-label">Tipo</label>
            <select class="form-select" name="tipo" id="auth-select">
                <option value="Intersemestral" >Intersemestral</option>
            </select>
        </div>
        <div class="col-4">
            <label for="name" class="form-label">Categoría</label>
            <select class="form-select" name="cat" id="auth-select">
                <option value="Programación" @if ($curso->cat == "Programación") {{ 'selected' }} @endif>Programación</option>
                <option value="Bases de Datos"   @if ($curso->cat == "Bases de Datos") {{ 'selected' }} @endif>Bases de datos</option>
              <option value="Hardware"   @if ($curso->cat == "Hardware") {{ 'selected' }} @endif>Hardware</option>
              <option value="Desarrollo"  {{ $curso->cat == "Desarrollo" ? 'selected' : '' }}>Desarrollo</option>
              <option value="Otros"   @if ($curso->cat == "Otros") {{ 'selected' }} @endif>Otros</option>


            </select>
        </div>
      </div>
    <div class="input-div row">
         
        <div class="col-4">
            <label for="name" class="form-label">Temario</label>
              <p>Actual: <a href="{{asset('/temarios/'.$curso->temario)}}">{{$curso->temario}}</a></p>
              <p>Actualizar: </p>
                <input name="temario" type="file" placeholder="" value="">
        </div>
        <div class="col-4">
            <label for="name" class="form-label">Imagen</label>
            <p>Actual: </p>
            <img class="w-25" src="{{asset('/img/logos/'.$curso->imagen)}}" alt="">
              <p>Actualizar: </p>
                <input name="imagen" type="file" placeholder="" value="">
        </div>
         <div class="col-4">
            <label for="name" class="form-label">Nivel</label>
            <select class="form-select" name="nivel" id="auth-select">
                <option value="Básico"  @if ($curso->nivel == "Básico") {{ 'selected' }} @endif>Básico</option>
                <option value="Intermedio"   @if ($curso->nivel == "Intermedio") {{ 'selected' }} @endif>Intermedio</option>
              <option value="Avanzado"   @if ($curso->nivel == "Avanzado") {{ 'selected' }} @endif>Avanzado</option>
            </select>
        </div>
        <input type="hidden" name="dias" value="L-V">
      </div>
        <div class="input-div row">
          
          <input name="cupo" type="hidden" placeholder="" value="50">

          <!-- <div class="col-4">
            <label for="name" class="form-label">Cupo</label>
            <input name="cupo" type="hidden" placeholder="" value="50">
          </div> -->
          <!-- <div class="col-4">
            <label for="name" class="form-label">Semestre</label>
            <select class="form-select" name="semestre" id="auth-select">
                <option value="22-1" >22-1</option>
            </select>
          </div> -->
          <div class="col-4">
            <label for="name" class="form-label">Turno</label>
            <select class="form-select" name="turno" id="auth-select">
                <option value="AM" >Matutino</option>
              <option value="PM" >Vespertino</option>

            </select>
          </div>

          <input type="hidden" name="semestre" value="22-1">
           <input type="hidden" name="publicado" value="0">

        </div>
         <div class="input-div mx-auto mt-3 col-4">
          <input type="submit" class="auth-submit btn btn-rosa" value="Actualizar">
        </div>
       
        <input type="hidden" name="precio_unam" value="500">
        <input type="hidden" name="precio_ext" value="700">
        <input type="hidden" name="precio_gral" value="900">
      
      <!-- Submit -->
      
    </form>
  </section>
</main>
@endsection