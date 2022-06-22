@extends('layouts.becarios')

@section('content')

<div class="table-container">
  <table class="table table-striped table-hover" aria-label>
    <thead>
      <tr>
        <td scope="col">Titulo</td>
        <td scope="col">Link del documento</td>
        <td scope="col">Action</td>
      </tr>
    </thead>
    <tbody>
      <!-- Post preview-->
      <div class="post-preview">
      @foreach ($temas as $tema)
        <tr>
          <td>{{ $tema->title }}</td>
          <td><a href="{{ $tema->url_notes }}"> Link del documento</a></td>
          <!-- Se pone la palabra "Link" porque las url son muy grandes y se salen de su cuadro -->
          <td class="text-center">
            <a href="{{ route('temas.edit', $tema->id)}}" class="btn btn-primary btn-sm">Editar</a>
            <form action="{{ route('temas.destroy', $tema->id)}}" method="post" style="display: inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">Borrar</button>
            </form>
          </td>
      
      <!-- Divider-->
      @endforeach
      <br> <br>
      </div>
      <a class="btn btn-success" href="{{ route('temas.create', $id)}}"> Crear Nuevo Tema</a>
    </tbody>
  </table>
  <a class="btn btn-primary" href="{{ route('materiales.index') }}"> Regresar</a>
</div>
@endsection