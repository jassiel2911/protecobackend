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
      <form method="post" action="{{ route('convocatorias.update', $convocatoria[0]->id) }}">
          <div class="form-group" >
              @csrf
              @method('PUT')
              <label for="link">Link</label>
              <input type="text" class="form-control" name="link" value="{{ $convocatoria[0]->url_announcement }}"/>
          </div>
          <button type="submit" class="btn btn-success">Actualizar Convocatoria</button>
      </form>
      <a class="btn btn-primary" href="{{ route('convocatorias.index') }}"> Regresar</a>
  </div>
</div>
@endsection