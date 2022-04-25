@extends('layouts.admin')

@section('content')
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

<main> 
  <x-ticket-nav/>
 
  <section class="container my-5">
    @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h2 class="text-azul">Pendientes de pago</h2>
      <button id="btnExport" onclick="fnExportToExcel('xlsx', 'Pendientes de pago')" class="btn btn-azul d-inline">Exportar lista a xlsx</button>

      <section class="container-fluid show-curso_lista">
          <table id="lista" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Correo</th>
                <th scope="col">Procedencia</th>
                <th scope="col">Monto</th>
                <th scope="col">Status</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tickets as $ticket)
              @if($ticket->semestre == "22-2")
              <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                <th scope="row">{{$ticket->id}}</th>
                <td>{{$ticket->user->fname." ".$ticket->user->lname}}</td>
                <td>{{$ticket->user->email}}</td>
                <td>{{$ticket->user->origin}}</td>
                <td>{{$ticket->total}}</td>
                <td>{{$ticket->status}}</td>
                <td>
                  <!-- <a href="admin-user-show.html"><span class="tag-category badge rounded-pill bg-dark">Ver</span></a> -->
                  <form action="{{route('admintickets.destroy', $ticket->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('admintickets.show',$ticket->id)}}"><span class="tag-category badge rounded-pill bg-success">Ver</span></a>
                    <a href="{{route('admintickets.edit',$ticket->id)}}"><span class="tag-category badge rounded-pill bg-info">Editar</span></a>
                    <br><br>
                    <button style="background-color:transparent; border:none;" type="submit"><span class="tag-category badge rounded-pill bg-danger">Eliminar</span></ style="background-color:transparent; border:none;">
                  </form>
                </td>
              </tr>
              <tr>
              </tr>
              <p class="d-none">{{$total = $total + $ticket->total}}</p>
              @endif
              @endforeach
            </tbody>

            <h4 class="text-end">{{$total}}</h4>

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