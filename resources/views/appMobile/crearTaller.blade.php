<!-- Vista editar taller. -->
@extends('layouts.becarios')

@section('content')
<div class="card push-top">
  <div class="card-header">
    <h2>Añadir Taller</h2>
  </div>
  <br>
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
    @foreach ($talleres as $taller)
    @endforeach
    <form method="post" action="{{ route('talleres.store') }}" enctype="multipart/form-data">
      <div class="form-group">
        @csrf
        <label for="ID" hidden>ID</label>
        <input type="number" class="form-control" name="ID" value="{{ $taller->id + 1}}" hidden />
      </div>
      <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" name="titulo" />
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <input type="text" class="form-control" name="descripcion" />
      </div>
      <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="text" class="form-control" name="fecha" />
      </div>
      <div class="form-group">
        <label for="link">Link</label>
        <input type="text" class="form-control" name="link" />
      </div>
      <button type="submit" class="btn btn-success">Añadir Taller</button>
      <a class="btn btn-primary" href="{{ route('talleres.index') }}"> Regresar</a>
    </form>
  </div>
</div>

@endsection