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
      <form method="post" action="{{ route('temas.update', $tema->id) }}">
          <div class="form-group" >
              @csrf
              @method('PUT')
              <label for="titulo">Titulo</label>
              <input type="text" class="form-control" name="titulo" value="{{ $tema->title }}"/>
          </div>
          <div class="form-group">
              <label for="ID_material" hidden>ID material</label>
              <input type="text" class="form-control" name="ID_material" value="{{ $tema->id_material}}"hidden/>
          </div>
          <div class="form-group">
              <label for="link_notas">Link de las notas</label>
              <input type="text" class="form-control" name="link_notas" value="{{ $tema->url_notes }}"/>
          </div>
          <button type="submit" class="btn btn-success">Actualizar Taller</button>
      </form>
      <a class="btn btn-primary" href="{{ route('temas.show', $tema->id_material) }}"> Regresar</a>
  </div>
</div>
@endsection