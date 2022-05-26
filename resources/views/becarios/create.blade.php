@extends('layouts.becarios')

@section('content')
 <main>
  <section class="container mt-5">
   <a href="{{route('becarios.index')}}">Regresar</a><br><br>
    <h1 class="text-rosa text-center">Crear curso</h1><br>

    @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form class="container" action="{{route('becarios.store')}}" method="POST" enctype="multipart/form-data" style="max-width:1000px; margin:1rem auto 4rem;">
        @csrf
      <!-- Nombre -->
      <div class="input-div row">
        <div class="col-12 col-lg-4">
          <label for="name" class="form-label">Nombre</label>
          <input name="nombre" type="text" placeholder="" required>
        </div>
        <div class="col-12 col-lg-4">
          <label for="name" class="form-label">Fecha de inicio</label>
          <input name="fecha_inicio" type="date" placeholder="" required>
        </div>
        <div class="col-12 col-lg-4">
          <label for="name" class="form-label">Fecha de termino</label>
          <input name="fecha_fin" type="date" placeholder="" required>
        </div>
      </div>
    <div class="input-div row">
        <!-- <div class="col-12 col-lg-4">
          <label for="name" class="form-label">Días</label>
          <input name="dias" type="string" placeholder="" >
        </div> -->
        <div class="col-12 col-lg-4">
          <label for="name" class="form-label">Antecedentes</label>
          <input name="antecedentes" type="string" placeholder="" required>
        </div>
        <div class="col-12 col-lg-4">
          <label for="name" class="form-label">Hora inicio</label>
          <input name="hora_inicio" type="time" placeholder="" required>
        </div>
        <div class="col-12 col-lg-4">
          <label for="name" class="form-label">Hora término</label>
          <input name="hora_fin" type="time" placeholder="" required>
        </div>
        
      </div>
     <div class="input-div row">
        
        <div class="col-12 col-lg-4">
          <label for="name" class="form-label">Equipo</label>
          <input name="equipo" type="string" placeholder="" required>
        </div>
        <div class="col-12 col-lg-4">
            <label for="name" class="form-label">Tipo</label>
            <select class="form-select" name="tipo" id="auth-select" required>
                <option value="Intersemestral" >Intersemestral</option>
                <option value="Semestral"  >Semestral</option>
            </select>
        </div>
        <div class="col-12 col-lg-4">
            <label for="name" class="form-label">Categoría</label>
            <select class="form-select" name="cat" id="auth-select" required>
                <option value="Programación" >Programación</option>
                <option value="Bases de Datos"  >Bases de datos</option>
              <option value="Hardware"  >Hardware</option>
              <option value="Desarrollo">Desarrollo</option>
              <option value="Otros"  >Otros</option>


            </select>
        </div>
      </div>
    <div class="input-div row">
         
        <div class="col-12 col-lg-4">
          <label for="name" class="form-label">Temario</label>
          <input name="temario" type="file" placeholder="" required>
        </div>
        <div class="col-12 col-lg-4">
          <label for="name" class="form-label">Imagen</label>
          <input name="imagen" type="file" placeholder="" required>
        </div>
         <div class="col-12 col-lg-4">
            <label for="name" class="form-label">Nivel</label>
            <select class="form-select" name="nivel" id="auth-select" required>
                <option value="Básico" >Básico</option>
                <option value="Intermedio"  >Intermedio</option>
              <option value="Avanzado"  >Avanzado</option>
            </select>
        </div>
        <input type="hidden" name="dias" value="L-V">
      </div>
        <div class="input-div row">
          
          <input name="cupo" type="hidden" placeholder="" value="50" required>

          <!-- <div class="col-4">
            <label for="name" class="form-label">Cupo</label>
            <input name="cupo" type="hidden" placeholder="" value="50">
          </div> -->
          <div class="col-12 col-lg-4">
            <label for="name" class="form-label">Semestre</label>
            <select class="form-select" name="semestre" id="auth-select" required>
                <option value="22-2" >22-2</option>
                <option value="Presencial" >Presencial</option>
            </select>
          </div>
          <div class="col-12 col-lg-4">
            <label for="name" class="form-label">Turno</label>
            <select class="form-select" name="turno" id="auth-select" required>
                <option value="AM" >Matutino</option>
              <option value="PM" >Vespertino</option>

            </select>
          </div>
           <input type="hidden" name="publicado" value="0">

        </div>
         <div class="input-div mx-auto mt-3 col-4">
          <input type="submit" class="auth-submit btn btn-rosa" value="Crear">
        </div>
       
        <input type="hidden" name="precio_unam" value="500">
        <input type="hidden" name="precio_ext" value="700">
        <input type="hidden" name="precio_gral" value="900">
      
      <!-- Submit -->
      
    </form>
  </section>
</main>
@endsection