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
    Añadir Herramienta
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
    @foreach ($herramientas as $herramienta)
    @endforeach
      <form method="post" action="{{ route('herramientas.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="ID" hidden>ID</label>
              <input type="number" class="form-control" name="ID" value="{{ $herramienta->id + 1}}" hidden />
          </div>
          <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" class="form-control" name="titulo"/>
          </div>
          <div class="form-group">
              <label for="descripcion">Descripción</label>
              <input type="text" class="form-control" name="descripcion"/>
          </div>
          <div class="form-group">
              <label for="link_imagen">Link imagen</label>
              <input type="text" class="form-control" name="link_imagen"/>
          </div>
          <div class="form-group">
              <label for="link_pagina">Link página</label>
              <input type="text" class="form-control" name="link_pagina"/>
          </div>
          <button type="submit" class="btn btn-success">Añadir Herramienta</button>
      </form>
      <a class="btn btn-primary" href="{{ route('herramientas.index') }}"> Regresar</a>
  </div>
</div>
@endsection