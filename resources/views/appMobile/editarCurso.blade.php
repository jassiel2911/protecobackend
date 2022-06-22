<!-- editar curso. -->
@extends('layouts.becarios')

@section('content')


<div class="card push-top">
  <div class="card-header">
    <h2>Editar & Actualizar</h2>
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
    <form method="post" action="{{ route('cursosApp.update', $curso->id) }}">
      <div class="form-group">
        @csrf
        @method('PUT')
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" name="titulo" value="{{ $curso->title }}" />
      </div>
      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <input type="text" class="form-control" name="descripcion" value="{{ $curso->description }}" />
      </div>
      <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="text" class="form-control" name="fecha" value="{{ $curso->date }}" />
      </div>
      <div class="form-group">
        <label for="link">Link</label>
        <input type="text" class="form-control" name="link" value="{{ $curso->link }}" />
      </div>
      <button type="submit" class="btn btn-success">Actualizar Taller</button>
      <a class="btn btn-primary" href="{{ route('cursosApp.index') }}"> Regresar</a>
    </form>
  </div>
</div>

@endsection