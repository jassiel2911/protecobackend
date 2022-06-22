@extends('layouts.becarios')

@section('content')


<div class="card push-top">
  <div class="card-header">
    Añadir Material
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
    @foreach ($materiales as $material)
    @endforeach
      <form method="post" action="{{ route('materiales.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="ID" hidden>ID</label>
              <input type="number" class="form-control" name="ID" value="{{ $material->id + 1}}" hidden />
          </div>
          <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" class="form-control" name="titulo"/>
          </div>
          <div class="form-group">
              <label for="link_imagen">Link imagen</label>
              <input type="text" class="form-control" name="link_imagen"/>
          </div>
          <button type="submit" class="btn btn-success">Añadir Material</button>
      </form>
      <a class="btn btn-primary" href="{{ route('materiales.index') }}"> Regresar</a>
  </div>
</div>
@endsection