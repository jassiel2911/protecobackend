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
      <form method="post" action="{{ route('videos.update', $video->id) }}">
          <div class="form-group" >
              @csrf
              @method('PUT')
              <label for="titulo">Titulo</label>
              <input type="text" class="form-control" name="titulo" value="{{ $video->title }}"/>
          </div>
          <div class="form-group">
              <label for="ID_material" hidden>ID material</label>
              <input type="text" class="form-control" name="ID_material" value="{{ $video->id_material}}" hidden/>
          </div>
          <div class="form-group">
              <label for="codigo">Código del video</label>
              <input type="text" class="form-control" name="codigo" value="{{ $video->code }}"/>
          </div>
          <button type="submit" class="btn btn-success">Actualizar Taller</button>
      </form>
      <a class="btn btn-primary" href="{{ route('videos.show', $video->id_material) }}"> Regresar</a>
  </div>
</div>
@endsection