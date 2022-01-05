@extends('layouts.app')

@section('content')
 <main>
  <section class="container mt-5">
   <a href="{{route('perfil.index')}}">Regresar</a><br><br>
    <h1 class="text-rosa text-center">Deposito bbva</h1><br>

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
        <div class="col-5">
          <label for="name" class="form-label">Fecha de pago</label>
          <input name="fecha" type="date" placeholder="" >
        </div>
         <div class="col-7">
          <label for="name" class="form-label">Número de Ficha referenciada (20 dígitos)</label>
          <input name="no_ficha" type="string" placeholder="" >
        </div>
       
      </div>
    <div class="input-div row">
        <div class="col-7">
          <label for="name" class="form-label">4 últimos dígitos de cuenta de origen</label>
          <input name="ultimos_digitos" type="text" placeholder="" >
        </div>
        <div class="col-5">
          <label for="name" class="form-label">Guía CIE</label>
          <input name="cie" type="text" placeholder="" >
        </div>
      </div>
     <div class="input-div row">
        <div class="col-6">
          <label for="name" class="form-label">Foto del ticket</label>
          <input name="captura" type="file" placeholder="" >
        </div>
      </div>
      <div class="input-div row">
        <div class="col-4"></div>
        <div class="col-4">
          <input type="submit" class="auth-submit btn-form btn btn-rosa" value="Enviar">
        </div>
      </div>
       
        <input type="hidden" name="metodo_pago" value="depositoBBVA">
        <input type="hidden" name="banco" value="bbva">
        <input type="hidden" name="ficha_id" value="{{$ficha_id}}">
      
      <!-- Submit -->
      
    </form>
  </section>
</main>
@endsection