@extends('layouts.app')

@section('content')
 <main>
  <section class="container mt-5">
   <a href="{{route('becarios.index')}}">Regresar</a><br><br>
    <h1 class="text-rosa text-center">Crear curso</h1><br>

    <!-- @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif -->

    <form class="container w-75" action="{{route('comprobante.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <!-- Nombre -->
      <div class="input-div row">
        <div class="col-4">
          <label for="name" class="form-label">Fecha de pago</label>
          <input name="fecha" type="date" placeholder="" >
        </div>
        <div class="col-4">
            <label for="metodo" class="form-label">Método de pago</label>
            <select class="form-select" name="metodo_pago" id="auth-select">
                <option value="Deposito BBVA">Depósito en sucursal BBVA</option>
                <option value="App BBVA"  >App o transferencia BBVA</option>
                <option value="Otro banco"  >Otro banco</option>
            </select>
        </div>
        <div class="col-4">
          <label for="name" class="form-label">Banco</label>
          <input name="banco" type="date" placeholder="BBVA" >
        </div>
      </div>
    <div class="input-div row">
        <div class="col-4">
          <label for="name" class="form-label">Número de Ficha referenciada (20 dígitos)</label>
          <input name="no_ficha" type="string" placeholder="" >
        </div>
        <div class="col-4">
          <label for="name" class="form-label">4 últimos dígitos de cuenta de origen</label>
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
          <input name="cupo" type="hidden" placeholder="" value="50">

          <!-- <div class="col-4">
            <label for="name" class="form-label">Cupo</label>
            <input name="cupo" type="hidden" placeholder="" value="50">
          </div> -->
          <div class="col-4">
            <label for="name" class="form-label">Semestre</label>
            <select class="form-select" name="semestre" id="auth-select">
                <option value="22-1" >22-1</option>
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