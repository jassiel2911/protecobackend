@extends('layouts.admin')

@section('content')
 <main>
  <section class="container mt-5">
   <a href="{{route('cursos.index')}}">Regresar</a><br><br>
    <h1 class="text-rosa text-center">Editar curso</h1><br>

    @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form class="container w-75" action="{{route('cursos.update', $curso->id)}}" method="POST" enctype="multipart/form-data">
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
        <div class="col-4">
          <label for="name" class="form-label">Días</label>
          <input name="dias" type="string" placeholder="" value="{{$curso->dias}}">
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Hora inicio</label>
          <input name="hora_inicio" type="time" placeholder="" value="{{$curso->hora_inicio}}">
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Hora término</label>
          <input name="hora_fin" type="time" placeholder="" value="{{$curso->hora_fin}}">
        </div>
        
      </div>
     <div class="input-div row">
        <div class="col-4">
          <label for="name" class="form-label">Antecedentes</label>
          <input name="antecedentes" type="string" placeholder="" value="{{$curso->antecedentes}}">
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Equipo</label>
          <input name="equipo" type="string" placeholder="" value="{{$curso->equipo}}">
        </div>
        <div class="col-4">
            <label for="name" class="form-label">Tipo</label>
            <select class="form-select" name="tipo" id="auth-select">
                <option value="Intersemestral" {{ $curso->tipo == "Intersemestral" ? 'selected' : '' }}>Intersemestral</option>
                <option value="Semestral"  {{ $curso->tipo == "Semestral" ? 'selected' : '' }}>Semestral</option>
            </select>
        </div>
      </div>
    <div class="input-div row">
         <div class="col-4">
            <label for="name" class="form-label">Categoría</label>
            <select class="form-select" name="cat" id="auth-select">
                <option value="Programación" {{ $curso->cat == "Programación" ? 'selected' : '' }}>Programación</option>
                <option value="Bases de Datos"  {{ $curso->cat == "Bases de Datos" ? 'selected' : '' }}>Bases de datos</option>
              <option value="Hardware"  {{ $curso->cat == "Hardware" ? 'selected' : '' }}>Hardware</option>
              <option value="Otros"  {{ $curso->cat == "Otros" ? 'selected' : '' }}>Otros</option>


            </select>
        </div>
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
        
      </div>
        <div class="input-div row">
           <div class="col-4">
              <label for="name" class="form-label">Nivel</label>
              <select class="form-select" name="nivel" id="auth-select">
                  <option value="Básico" >Básico</option>
                  <option value="Intermedio"  >Intermedio</option>
                <option value="Avanzado"  >Avanzado</option>
              </select>
          </div>
          <div class="col-4">
            <label for="name" class="form-label">Cupo</label>
            <input name="cupo" type="number" placeholder="" value="{{$curso->cupo}}">
          </div>
          <div class="col-4">
            <label for="name" class="form-label">Semestre</label>
            <select class="form-select" name="semestre" id="auth-select">
                <option value="22-1" selected>22-1</option>
            </select>
          </div>
         
        </div>
        <div class="input-div row mt-3">
           <div class="col-4">
            <input type="number" class="auth-submit" value="{{$curso->publicado}}" name="publicado">
          </div>
          <div class="col-4">
            <input type="submit" class="auth-submit btn btn-rosa" value="Actualizar">
          </div>
        </div>
        
       
        <input type="hidden" name="precio_unam" value="500">
        <input type="hidden" name="precio_ext" value="700">
        <input type="hidden" name="precio_gral" value="900">
      
      <!-- Submit -->
      
    </form>
  </section>
</main>
@endsection