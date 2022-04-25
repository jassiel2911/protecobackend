@extends('layouts.admin')

@section('content')
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

<main>
    <div class="container">
        <section class="container mt-5">
        <a href="{{route('cursos.index')}}">Regresar</a><br><br>
          <h1 class="text-rosa">{{$curso->nombre}}</h1><br>
          <div class="card bg-light p-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <p>Semestre {{$curso->semestre}}</p>
                    <p>Del {{\Carbon\Carbon::parse($curso->fecha_inicio)->format('j F, Y') }} al {{\Carbon\Carbon::parse($curso->fecha_fin)->format('j F, Y') }}</p>
                    <p>De {{$curso->hora_inicio}} a {{$curso->hora_fin}}</p> 
                    <p>{{$curso->dias}}</p>
                    <p>Antecedentes: {{$curso->antecedentes}}</p>
                    <p>Equipo: {{$curso->equipo}}</p>
                </div>
                 <div class="col-12 col-lg-6">
                    <p>Tipo {{$curso->tipo}}</p>
                    <p>Categoría: {{$curso->cat}}</p>
                    <p>Nivel: {{$curso->nivel}}</p>
                    <p>Cupo:  {{$curso->cupo}}</p> 
                    <p>Inscritos:  {{$curso->inscritos}}</p> 
                    <p>Temario: <a target="_blank" href="{{asset('/temarios/'.$curso->temario)}}">{{$curso->temario}}</a></p>
                </div>
            </div>
        </div>
        </section>
        <section class="container mt-5">
            <h2 class="text-rosa">Asistentes</h2>
            <button id="btnExport" onclick="fnExportToExcel('xlsx', '{{$curso->nombre}}')" class="btn btn-azul d-inline">Exportar lista a xlsx</button>

            <table id="lista" class="table table-hover table-bordered mt-4">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Status</th>
                    <!-- <th scope="col">Calificacion</th> -->
                    <!-- <th scope="col">Constancia</th> -->
                  </tr>
                </thead>
                <tbody>
                    @foreach($ticket_items as $ticket_item)
                        <tr @if($ticket_item->ticket->status == "Sin ficha") style="background-color:#F7F6F2"
                             @elseif($ticket_item->ticket->status == "Pendiente de pago") style="background-color:#FFF1BD"
                            @elseif($ticket_item->ticket->status == "Pago recibido. Pendiente de aprobación") style="background-color:#FFBC97"
                            @elseif($ticket_item->ticket->status == "Pagado") style="background-color:#E7FBBE"  @endif>
                            <td>{{$i = $i+1}}</td>
                            <td>{{$ticket_item->ticket->user->fname . " " .$ticket_item->ticket->user->lname}}</td>
                            <td>{{$ticket_item->ticket->user->email}}</td>
                            <td>{{$ticket_item->ticket->user->origin}}</td>
                            <td>{{$ticket_item->ticket->status}}</td>
                            <!-- <td>
                                <form action="">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" min="0" max="10" name="cal" id="" class="bg-light border-dark">
                                        </div>
                                        <div class="col-6">
                                            <button type="text" class="submit btn-form btn-rosa " >Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </td> -->
                            <!-- <td>-</td> -->
                        </tr>
                    @endforeach
                </tbody>

              </table>
        </section>
    </div>
</main>
<script>
    function fnExportToExcel(fileExtension,fileName){
        var elt=document.getElementById("lista");
        var wb = XLSX.utils.table_to_book(elt, {sheet:"sheet1"});
        return XLSX.writeFile(wb, fileName+"."+fileExtension || ('Lista.'+(fileExtension || 'xlsx')));
    }
</script>
@endsection