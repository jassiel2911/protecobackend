<!-- Vista editar asesoría. -->
@extends('layouts.becarios')

@section('content')
<div class="card push-top">
  <div class="card-header">
    Editar & Actualizar
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
    <form method="post" action="{{ route('asesorias.update', $asesoria[0]->id) }}">
      <div class="form-group">
        @csrf
        @method('PUT')
        <label for="link">Link</label>
        <input type="text" class="form-control" name="link" value="{{ $asesoria[0]->url_consultancies }}" />
      </div>
      <button type="submit" class="btn btn-success">Actualizar Asesorías</button>
    </form>
    <a class="btn btn-primary" href="{{ route('asesorias.index') }}"> Regresar</a>
  </div>
</div>

@endsection