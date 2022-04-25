@extends('layouts.admin')

@section('content')
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

<main> 
  <x-comprobantes/>
 
  <section class="container my-5">
    <!-- @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif -->
    <h2 class="text-azul">Otro Banco</h2>
      <button id="btnExport" onclick="fnExportToExcel('xlsx', 'ComprobantesOtrobanco')" class="btn btn-azul d-inline">Exportar lista a xlsx</button>
      <section class="container-fluid">
          <table id="lista" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th scope="col">No Ficha</th>
                <th scope="col">Banco</th>
                <th scope="col">U. digitos</th>
                <th scope="col">CIE</th>
                <th scope="col">Monto</th>
                <th scope="col">Probatorio</th>
              </tr>
            </thead>
             <tbody>
              @foreach($comprobantes as $comprobante)
              <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                <th scope="row">{{$comprobante->id}}</th>
                <td scope="row">{{$comprobante->ficha->ticket->user->lname." ".$comprobante->ficha->ticket->user->fname}}</td>
                <td scope="row">{{$comprobante->fecha}}</td>
                <td scope="row">{{$comprobante->no_ficha}}</td>
                <th scope="row">{{$comprobante->banco}}</th>
                <td scope="row">{{$comprobante->ultimos_digitos}}</td>
                <td scope="row">{{$comprobante->cie}}</td>
                <td scope="row">{{$comprobante->monto}}</td>
                <td scope="row">
                  <iframe src="{{asset("comprobantes/$comprobante->captura")}}" width="500px" height="800px">
                  </iframe>
                  <a target="_blank" href="{{asset("comprobantes/$comprobante->captura")}}">Ver archivo</a>
                </th>
              </tr>
               <p class="d-none">{{$total = $total + $comprobante->monto}}</p>
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