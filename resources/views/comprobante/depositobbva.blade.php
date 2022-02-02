@extends('layouts.app')

@section('content')
 <main>
  <section class="container mt-5">
   <a href="{{route('perfil.index')}}">Regresar</a><br><br>
    <h1 class="text-rosa text-center">Deposito en efectivo bbva</h1><br>
    <div class="alert alert-danger" role="alert">
      Por favor revisa que los datos sean correctos, de otra manera no procederá el pago ante la UNAM.
    </div>
   

    <!-- @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif -->

    <form class="container" action="{{route('comprobante.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <!-- Nombre -->
      <div class="input-div row">
        <div class="col-12 col-md-6 my-3">
          <label for="name" class="form-label">Fecha de pago</label>
          <input name="fecha" type="date" placeholder="" required>
        </div>
         <div class="col-12 col-md-6 my-3">
          <label for="name" class="form-label">Número de REFERENCIA de la ficha de pago (20 dígitos) <br><br>Ejemplo: 
            <img src="{{asset('img/referencia.png')}}" alt="" class="img-fluid">
          </label>
          <input name="no_ficha" type="string" placeholder="" required>
           @error('no_ficha')
              <span class="text-danger">El # de ficha debe contener 20 caracteres</span>
          @enderror
        </div>
       
      </div>
    <div class="input-div row">
       
        <div class="col-12 col-md-6 my-3">
          <label for="name" class="form-label">Guía CIE</label>
          <input name="cie" type="text" placeholder="" required >
        </div>
        <div class="col-12 col-md-6 my-3">
          <label for="name" class="form-label">Foto del ticket</label>
          <input name="captura" type="file" placeholder="" required>
        </div>
      </div>
     <div class="input-div row">
        
        
      </div>
      <div class="input-div row">
          <input type="submit" class="auth-submit btn-form btn btn-rosa mx-auto" value="Enviar" style="max-width: 20rem;">
      </div>
       
        <input type="hidden" name="metodo_pago" value="depositoBBVA">
        <input type="hidden" name="banco" value="bbva">
        <input type="hidden" name="ultimos_digitos" value="0">
        <input type="hidden" name="ficha_id" value="{{$ficha_id}}">
        <input type="hidden" name="ticket_id" value="{{$ticket_id}}">
      
      <!-- Submit -->
      
    </form>
  </section>
</main>
@endsection