@extends('layouts.admin')

@section('content')
 <main>
  <section class="container mt-5">
   <a href="{{route('cursos.index')}}">Regresar</a><br><br>
    <h1 class="text-rosa text-center">Crear curso</h1><br>

    @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form class="container w-75" action="{{route('cursos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <!-- Nombre -->
      <div class="input-div row">
        <div class="col-4">
          <label for="name" class="form-label">Nombre</label>
          <input name="nombre" type="text" placeholder="" >
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Fecha de inicio</label>
          <input name="fecha_inicio" type="date" placeholder="" >
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Fecha de termino</label>
          <input name="fecha_fin" type="date" placeholder="" >
        </div>
      </div>
    <div class="input-div row">
        <div class="col-4">
          <label for="name" class="form-label">Días</label>
          <input name="dias" type="string" placeholder="" >
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Hora inicio</label>
          <input name="hora_inicio" type="time" placeholder="" >
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Hora término</label>
          <input name="hora_fin" type="time" placeholder="" >
        </div>
        
      </div>
     <div class="input-div row">
        <div class="col-4">
          <label for="name" class="form-label">Antecedentes</label>
          <input name="antecedentes" type="string" placeholder="" >
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Equipo</label>
          <input name="equipo" type="string" placeholder="" >
        </div>
        <div class="col-4">
            <label for="name" class="form-label">Tipo</label>
            <select class="form-select" name="tipo" id="auth-select">
                <option value="Intersemestral" >Intersemestral</option>
                <option value="Semestral"  >Semestral</option>
            </select>
        </div>
      </div>
    <div class="input-div row">
         <div class="col-4">
            <label for="name" class="form-label">Categoría</label>
            <select class="form-select" name="cat" id="auth-select">
                <option value="Programación" >Programación</option>
                <option value="Bases de Datos"  >Bases de datos</option>
              <option value="Hardware"  >Hardware</option>
              <option value="Desarrollo"  >Desarrollo</option>
              <option value="Otros"  >Otros</option>


            </select>
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Temario</label>
          <input name="temario" type="file" placeholder="" >
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Imagen</label>
          <input name="imagen" type="file" placeholder="" >
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
            <input name="cupo" type="number" placeholder="" >
          </div>
          <div class="col-4">
            <label for="name" class="form-label">Semestre</label>
            <select class="form-select" name="semestre" id="auth-select">
                <option value="22-2" >22-2</option>
            </select>
          </div>
         <input type="hidden" name="publicado" value="1">
        </div>
        <div class="input-div row">
          <div class="col-4">
            <label for="classroom" class="form-label">Link de Classroom</label>
            <input type="text" name="classroom">
          </div>
          <div class="col-4">
            <label for="classroom" class="form-label">Titular</label>
            <select class="form-select" name="titular" id="auth-select">
                @foreach($becarios as $becario)
                  <option value="22-1" >{{$becario->fname." ".$becario->lname}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-4">
            <label for="name" class="form-label">Turno</label>
            <select class="form-select" name="turno" id="auth-select">
                <option value="AM" >Matutino</option>
              <option value="PM" >Vespertino</option>

            </select>
          </div>
        </div>
         <div class="input-div mx-auto mt-3 col-4">
          <input type="submit" class="auth-submit btn btn-rosa" value="Crear">
        </div>
       
        <input type="hidden" name="precio_unam" value="600">
        <input type="hidden" name="precio_ext" value="700">
        <input type="hidden" name="precio_gral" value="800">
      
      <!-- Submit -->
      
    </form>
  </section>
</main>
@endsection