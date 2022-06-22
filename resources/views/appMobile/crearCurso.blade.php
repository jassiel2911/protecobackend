<!-- Vista crear curso. -->

@extends('layouts.becarios')

@section('content')

<div class="card push-top">
  <div class="card-header">
    <h2>Añadir Curso</h2>
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
    </div>
    @endif
    @foreach ($cursos as $curso)
    @endforeach
    <form method="post" action="{{ route('cursosApp.store') }}" enctype="multipart/form-data">
      <div class="form-group">
        @csrf
        <label for="ID" hidden>ID</label>
        <input type="number" class="form-control" name="ID" value="{{ $curso->id + 1}}" hidden />
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
      <button type="submit" class="btn btn-success">Añadir Curso</button>
      <a class="btn btn-primary" href="{{ route('cursosApp.index') }}"> Regresar</a>
    </form>
  </div>
</div>


@endsection