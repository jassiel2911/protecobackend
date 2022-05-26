@extends('layouts.admin')

@section('content')
<main> 
   @if(session('success'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <p>{{session('success')}}</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif
  <section class="container my-5">
    <div class="d-flex justify-content-between my-5">
      <h1 class="text-rosa">Fichas</h1><br>
    <form class="ml-auto" action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
            <div class="custom-file text-left">
                <input type="file" name="import_file" class="custom-file-input" id="customFile">
              <button class="btn btn-delgado btn-rosa">Importar data</button>
            </div>
        </div>
    </form>
    <!-- crear ficha -->
      <form class="ml-auto" action="{{ route('adminfichas.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
              <div class="custom-file text-left">
                <input placeholder="archivo" type="text" name="file_ficha">
                <input placeholder="monto" type="text" name="monto">
                <button type="submit" class="btn btn-delgado btn-rosa">Crear Ficha</button>
              </div>
          </div>
      </form>
    </div>
    <!-- @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif -->
    <ul class="nav bg-azul nav-pills nav-pills-cursos mb-3 d-flex" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true">600</button>
          </li>
          <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false">700</button>
          </li>
         <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-3" aria-selected="false">800</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-4" aria-selected="false">900</button>
        </li>
         <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-5-tab" data-bs-toggle="pill" data-bs-target="#pills-5" type="button" role="tab" aria-controls="pills-5" aria-selected="false">1000</button>
        </li>
         <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-6-tab" data-bs-toggle="pill" data-bs-target="#pills-6" type="button" role="tab" aria-controls="pills-6" aria-selected="false">1200</button>
        </li>
         <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-7-tab" data-bs-toggle="pill" data-bs-target="#pills-7" type="button" role="tab" aria-controls="pills-7" aria-selected="false">500</button>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
          <!-- 600 -->
          <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
               <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Archivo</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Ticket ID</th>
                    <th scope="col">Comprobante</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($fichas as $ficha)
                    @if($ficha->monto == 600)
                      <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                    <th scope="row">{{$ficha->id}}</th>
                    <td>{{$ficha->file_ficha}}</td>
                    <td>{{$ficha->monto}}</td>
                    <td>{{$ficha->ticket_id}}</td>
                    <td>
                        @foreach($comprobantes as $comprobante)
                          @if($comprobante->ficha_id == $ficha->id)
                            <p class="d-none">{{$total=$total+$ficha->monto}}</p>
                            ✅
                          @endif
                        @endforeach
                       
                    </td>
                    <td>
                      <a href="{{ route('adminfichas.edit', $ficha->id) }}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>
                    </td>
                  
                  </tr>
                    @endif
                  @endforeach
                </tbody>
                  <h4 class="text-end">{{$total}}</h4>
              </table>
          </div>
          <!-- 700 -->
          <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
               <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Archivo</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Ticket ID</th>
                    <th scope="col">Comprobante</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($fichas as $ficha)
                    @if($ficha->monto == 700)
                      <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                    <th scope="row">{{$ficha->id}}</th>
                    <td>{{$ficha->file_ficha}}</td>
                    <td>{{$ficha->monto}}</td>
                    <td>{{$ficha->ticket_id}}</td>
                    <td>
                      @foreach($comprobantes as $comprobante)
                        @if($comprobante->ficha_id == $ficha->id)
                          <p class="d-none">{{$total=$total+$ficha->monto}}</p>
                          ✅
                        @endif
                      @endforeach
                    </td>
                    <td>
                      <a href="{{ route('adminfichas.edit', $ficha->id) }}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>
                    </td>
                  
                  </tr>
                    @endif
                  @endforeach
                </tbody>
                  <h4 class="text-end">{{$total}}</h4>
              </table>
          </div>
          <!-- 800 -->
          <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
               <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Archivo</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Ticket ID</th>
                    <th scope="col">Comprobante</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($fichas as $ficha)
                    @if($ficha->monto == 800)
                      <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                    <th scope="row">{{$ficha->id}}</th>
                    <td>{{$ficha->file_ficha}}</td>
                    <td>{{$ficha->monto}}</td>
                    <td>{{$ficha->ticket_id}}</td>
                    <td>
                      @foreach($comprobantes as $comprobante)
                        @if($comprobante->ficha_id == $ficha->id)
                          <p class="d-none">{{$total=$total+$ficha->monto}}</p>
                          ✅
                        @endif
                      @endforeach
                    </td>
                    <td>
                      <a href="{{ route('adminfichas.edit', $ficha->id) }}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>

                    </td>
                  
                  </tr>
                    @endif
                  @endforeach
                </tbody>
                  <h4 class="text-end">{{$total}}</h4>
              </table>
          </div>
         <!-- 900 -->
          <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-3-tab">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Archivo</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Ticket ID</th>
                    <th scope="col">Comprobante</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($fichas as $ficha)
                    @if($ficha->monto == 900)
                      <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                    <th scope="row">{{$ficha->id}}</th>
                    <td>{{$ficha->file_ficha}}</td>
                    <td>{{$ficha->monto}}</td>
                    <td>{{$ficha->ticket_id}}</td>
                    <td>
                      @foreach($comprobantes as $comprobante)
                        @if($comprobante->ficha_id == $ficha->id)
                          <p class="d-none">{{$total=$total+$ficha->monto}}</p>
                          ✅
                        @endif
                      @endforeach
                    </td>
                    <td>
                      <a href="{{ route('adminfichas.edit', $ficha->id) }}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>

                    </td>
                    
                  </tr>
                    @endif
                  @endforeach
                </tbody>
                  <h4 class="text-end">{{$total}}</h4>
              </table>
          </div>
          <!-- 1000 -->
          <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-3-tab">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Archivo</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Ticket ID</th>
                    <th scope="col">Comprobante</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($fichas as $ficha)
                    @if($ficha->monto == 1000)
                      <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                    <th scope="row">{{$ficha->id}}</th>
                    <td>{{$ficha->file_ficha}}</td>
                    <td>{{$ficha->monto}}</td>
                    <td>{{$ficha->ticket_id}}</td>
                    <td>
                        @if($ficha->comprobante==1)
                        <p class="d-none">{{$total=$total+$ficha->monto}}</p>
                        ✅
                        @endif
                    </td>
                    <td>
                      <a href="{{ route('adminfichas.edit', $ficha->id) }}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>

                    </td>
                      
                  </tr>
                    @endif
                  @endforeach
                </tbody>
                  <h4 class="text-end">{{$total}}</h4>
              </table>
          </div>
          <!-- 1200 -->
          <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-3-tab">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Archivo</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Ticket ID</th>
                    <th scope="col">Comprobante</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($fichas as $ficha)
                    @if($ficha->monto == 1200)
                      <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                    <th scope="row">{{$ficha->id}}</th>
                    <td>{{$ficha->file_ficha}}</td>
                    <td>{{$ficha->monto}}</td>
                    <td>{{$ficha->ticket_id}}</td>
                    <td>
                        @if($ficha->comprobante==1)
                        <p class="d-none">{{$total=$total+$ficha->monto}}</p>
                        ✅
                        @endif
                    </td>
                    <td>
                      <a href="{{ route('adminfichas.edit', $ficha->id) }}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>

                    </td>
                      
                  </tr>
                    @endif
                  @endforeach
                </tbody>
                  <h4 class="text-end">{{$total}}</h4>
              </table>
          </div>
         <!-- 500 -->
        <div class="tab-pane fade" id="pills-7" role="tabpanel" aria-labelledby="pills-1-tab">
             <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Archivo</th>
                  <th scope="col">Monto</th>
                  <th scope="col">Ticket ID</th>
                  <th scope="col">Comprobante</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($fichas as $ficha)
                  @if($ficha->monto == 500)
                    <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                  <th scope="row">{{$ficha->id}}</th>
                  <td>{{$ficha->file_ficha}}</td>
                  <td>{{$ficha->monto}}</td>
                  <td>{{$ficha->ticket_id}}</td>
                  <td>
                    @foreach($comprobantes as $comprobante)
                      @if($comprobante->ficha_id == $ficha->id)
                        <p class="d-none">{{$total=$total+$ficha->monto}}</p>
                        ✅
                      @endif
                    @endforeach
                  </td>
                  <td>
                    <a href="{{ route('adminfichas.edit', $ficha->id) }}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>

                  </td>
                  
                </tr>
                  @endif
                @endforeach
              </tbody>
                <h4 class="text-end">{{$total}}</h4>
            </table>
        </div>
      </div>

  </section>
</main>

@endsection