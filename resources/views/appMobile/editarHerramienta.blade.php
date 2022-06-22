@extends('layouts.becarios')

@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Editar & Actualizar
  </div>
  <div class="card-body">
     @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('herramientas.update', $herramienta->id) }}">
          <div class="form-group" >
              @csrf
              @method('PUT')
              <label for="titulo">Titulo</label>
              <input type="text" class="form-control" name="titulo" value="{{ $herramienta->title }}"/>
          </div>
          <div class="form-group">
              <label for="descripcion">Descripción</label>
              <input type="text" class="form-control" name="descripcion" value="{{ $herramienta->description }}"/>
          </div>
          <div class="form-group">
              <label for="link_imagen">Link de la imagen</label>
              <input type="text" class="form-control" name="link_imagen" value="{{ $herramienta->image }}"/>
          </div>
          <div class="form-group">
              <label for="link_pagina">Link de la página</label>
              <input type="text" class="form-control" name="link_pagina" value="{{ $herramienta->link }}"/>
          </div>
          <button type="submit" class="btn btn-success">Actualizar Taller</button>
      </form>
      <a class="btn btn-primary" href="{{ route('herramientas.index') }}"> Regresar</a>
  </div>
</div>
@endsection