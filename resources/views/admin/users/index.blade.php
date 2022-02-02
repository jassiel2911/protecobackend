@extends('layouts.admin')

@section('content')
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

<main> 
  <x-admin-user-nav/>

  <section class="home-cursos container my-3">
      <h2 class="text-azul">Asistentes</h2>
      <button id="btnExport" onclick="fnExportToExcel('xlsx', 'Asistentes')" class="btn btn-azul d-inline">Exportar lista a xlsx</button>
      <section class="container show-curso_lista">
          <table id="lista" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Procedencia</th>
                <th scope="col">Comprobante</th>
                <th scope="col">No.Tickets</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->fname . ' ' . $user->lname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->origin}}</td>
                <td>
                  <!-- <img class="img-fluid" src="{{asset("probatorios/$user->probatorio")}}"> -->
                  <a target="_blank" href="{{asset("probatorios/$user->probatorio")}}">Ver</a>
                </td>
                <td>NA</td>
                <td>
                  <!-- <a href="admin-user-show.html"><span class="tag-category badge rounded-pill bg-dark">Ver</span></a> -->
                  <form action="{{route('admin.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('admin.edit',$user->id)}}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>
                    <button style="background-color:transparent; border:none;" type="submit"><span class="tag-category badge rounded-pill bg-dark">Eliminar</span></ style="background-color:transparent; border:none;">
                  </form>
                </td>
              </tr>
              <tr>
                <div class="collapse" id="{{$user->email}}">
                  <p>Hola {{$user->name}}</p>
                </div>
              </tr>
              @endforeach
            </tbody>

          </table>
      </section>
  </section>
</main>
<script>
    function fnExportToExcel(fileExtension,fileName){
        var elt=document.getElementById("lista");
        var wb = XLSX.utils.table_to_book(elt, {sheet:"sheet1"});
        return XLSX.writeFile(wb, fileName+"."+fileExtension || ('Lista.'+(fileExtension || 'xlsx')));
    }
</script>
@endsection