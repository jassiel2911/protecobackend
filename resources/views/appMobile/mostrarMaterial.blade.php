@extends('layouts.becarios')

@section('content')

<div class="table-container">
  <table class="table table-striped table-hover" aria-label>
    <thead>
      <tr>
        <td scope="col">Titulo</td>
        <td scope="col">Link de la imagen</td>
        <td scope="col">Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($materiales as $material)
      <!-- Post preview-->
      <div class="post-preview">
        <tr>
          <td>{{ $material->title }}</td>
          <td><a href="{{ $material->url }}"> Link de la imagen</a></td>
          <!-- Se pone la palabra "Link" porque las url son muy grandes y se salen de su cuadro -->
          <td class="text-center">
            <a href="{{ route('temas.show', $material->id) }}" class="btn btn-info">Temas</a>
            <a href="{{ route('videos.show', $material->id) }}" class="btn btn-secondary">Videos</a>
            <a href="{{ route('materiales.edit', $material->id)}}" class="btn btn-primary btn-sm">Editar</a>
            <form action="{{ route('materiales.destroy', $material->id)}}" method="post" style="display: inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit" hidden>Delete</button>
            </form>
          </td>
        </tr>
      </div>
      @endforeach
      <!-- Divider-->
      <!-- <hr class="my-4" />
      </td>  -->
      <br> <br> <br>
      <a class="btn btn-success" href="{{ route('materiales.create')}}"> Crear Nuevo Material</a>
    </tbody>
  </table>
</div>
@endsection