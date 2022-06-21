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
    Añadir Tema
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
    @foreach ($temas as $tema)
    @endforeach
      <form method="post" action="{{ route('temas.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="ID" hidden>ID</label>
              <input type="number" class="form-control" name="ID" value="{{1}}"  hidden/>
          </div>
          <div class="form-group">
              <label for="ID_material" hidden>ID material</label>
              <input type="text" class="form-control" name="ID_material" value="{{ $id}}"hidden/>
          </div>
          <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" class="form-control" name="titulo" required="required"/>
          </div>
          <div class="form-group">
              <label for="link">Link</label>
              <input type="text" class="form-control" name="link" required="required"/>
          </div>
          <button type="submit" class="btn btn-success">Añadir Tema</button>
      </form>
      <a class="btn btn-primary" href="{{ route('temas.show', $id) }}"> Regresar</a>
  </div>
</div>
@endsection