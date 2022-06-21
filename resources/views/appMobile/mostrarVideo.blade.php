@extends('layouts.becarios')

@section('content')
<div class="table-container">
  <table class="table table-striped table-hover" aria-label>
    <thead>
      <tr>
        <td scope="col">Titulo</td>
        <td scope="col">Código del video</td>
        <td scope="col">Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($videos as $video)
      <!-- Post preview-->
      <div class="post-preview">
        <tr>
          <td>{{ $video->title }}</td>
          <td>{{ $video->code  }}</td>
          <td class="text-center">
            <a href="{{ route('videos.edit', $video->id)}}" class="btn btn-primary btn-sm">Editar</a>
            <form action="{{ route('videos.destroy', $video->id)}}" method="post" style="display: inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">Borrar</button>
            </form>
          </td>
      @endforeach
      <br> <br>
      </div>
      <a class="btn btn-success" href="{{ route('videos.create', $id)}}"> Crear Nuevo Video</a>
    </tbody>
  </table>
  <a class="btn btn-primary" href="{{ route('materiales.index') }}"> Regresar</a>
</div>
@endsection
