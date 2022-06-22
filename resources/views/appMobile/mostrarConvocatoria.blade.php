@extends('layouts.becarios')

@section('content')
<div class="table-container">
  <table class="table table-striped table-hover" aria-label>
    <thead>
      <tr>
        <td scope="col">Link de la convocatoria</td>
        <td scope="col">Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($convocatorias as $convocatoria)
      <!-- Post preview-->
      <div class="post-preview">
        <tr>
          <td><a href="{{ $convocatoria->url_announcement }}"> Link convocatoria</a></td>
          <!-- Se pone la palabra "Link" porque las url son muy grandes y se salen de su cuadro -->
          <td class="text-center">
            <a href="{{ route('convocatorias.edit', $convocatoria->id)}}" class="btn btn-primary btn-sm">Editar</a>
          </td>
        </tr>
      </div>
      <!-- Divider-->
      @endforeach
    </tbody>
  </table>
</div>
@endsection