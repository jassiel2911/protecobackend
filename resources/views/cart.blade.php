@extends('layouts.app')

@section('content')

<main>
<!-- Muestrea un mensaje cuando se elimina el curso, indicando que se eliminó correctamente. -->
    
    <section class="container py-5 carrito px-5">
        @if(session('success'))
            <div class="alert bg-lavanda alert-dismissible fade show text-center" role="alert">
                <p class="">Se elimino correctamente</p>
            </div>
        @endif
        <h1 class="text-rosa text-center">Tu carrito <img src="{{asset('img/icons/generales/cart.svg')}}" alt="" width="30"></h1>
        @if($bandera == 1)
        <br>
            <h5 class="text-center">Aún no tienes cursos en tu carrito</h5>
            <img src="{{asset('img/icons/generales/Empty-bro.png')}}" alt="" class="img-fluid">
            <a class="d-block text-center text-rosa btn btn-rosa btn-min" href="{{route('ver-cursos.index')}}">Ver cursos</a>
        @else
            @foreach($carts as $cart)
                <div class="d-flex my-5 align-content-center align-items-center justify-content-between">
                    <div class="d-flex align-content-center align-items-center">
                        <img class="img-fluid" src="{{asset('/img/logos/'.$cart->curso->imagen)}}" alt="" width="100">
                        <h5 class="text-start mx-3">{{$cart->curso->nombre}}</h5>
                    </div>
                    <div class="d-flex align-content-center align-items-center justify-content-center">
                        <p class="d-none">{{$i = $i+1}}</p>
                        @if(auth()->user()->origin == "Comunidad UNAM")
                        <p style="margin:0;" class="text-start mx-3">$500</p>
                        <p class="d-none">{{$subtotal = $subtotal + 500}}</p>
                        <!-- Se comprueba si el índice del ciclo está en la posición 3 y en caso de ser verdadero, 
                        no se suma el precio del curso al total, esto se repite para cada tipo de usuario (estudiante, público en general, otro) -->
                            @if($loop->index == 2 || $loop->index == 5 || $loop->index == 8)
                                    
                            @else
                            <p class="d-none">{{$total = $total + 500}}</p>
                            @endif
                                
                        @elseif(auth()->user()->origin == "Alumno externo")
                        <p style="margin:0;" class="text-start mx-3">$600</p>
                        <p class="d-none">{{$subtotal = $subtotal + 600}}</p>

                            @if($loop->index == 2 || $loop->index == 5 || $loop->index == 8)
                                    
                            @else
                            <p class="d-none">{{$total = $total + 600}}</p>
                            @endif
                        @elseif(auth()->user()->origin == "Publico en general")
                        <p style="margin:0;" class="text-start mx-3">$700</p>
                            <p class="d-none">{{$subtotal = $subtotal + 700}}</p>

                            @if($loop->index == 2 || $loop->index == 5 || $loop->index == 8)
                                    
                            @else
                            <p class="d-none">{{$total = $total + 700}}</p>
                            @endif
                                
                        @endif
                        <form action="{{route('cart.destroy',$cart->curso_id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent trash"><img class="img-fluid" src="{{asset('img/icons/generales/trash.svg')}}" alt="" width="40"></button>
                        </form>
                    </div>
                </div>
            @endforeach
            <hr>
            <p class="text-end"><b>Subtotal: </b> ${{$subtotal}}</p>
            <p class="text-end">@if($i>=3)<b class="text-rosa ">Promoción 3x2 aplicada &#128640; </b>@endif<b>Total: </b> ${{$total}}</p>
             @if(auth()->user()->origin == "Publico en general")
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <p class="text-end">
                <svg class="bi flex-shrink-0" width="40" height="40" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <b>¿Eres comunidad UNAM o estudiante de otra escuela?</b><br>Sube <a class="text-rosa" href="{{route('perfil.index')}}">aquí</a> tu credencial o comprobante y recibe un descuento</p>
            </div>
            @endif
            <a href=""></a>

            <p class="text-end"></p>
            <form action="{{route('ticketsficha.store')}}" method="POST" class="d-flex justify-content-end my-4">
                @csrf
                <input type="hidden" name="total" value="{{$total}}">
                <a href="{{route('ver-cursos.index')}}" class="btn btn-lavanda mx-3">Ver más cursos</a>
                <button type="submit" class="btn btn-rosa ">Generar ticket</button>
            </form>

        @endif

        <!-- <form action="{{route('ticket.store')}}" method="POST">
             @csrf
            <input type="hidden" name="total" value="{{$total}}">
            <button type="submit" class="btn-form text-center text-white bg-rosa mx-3">Generar ticket </a>
         </form> -->
        <!-- <form action="{{route('ticketsficha.store')}}" method="POST" class="d-flex justify-content-end my-4">
            @csrf
            <input type="hidden" name="total" value="{{$total}}">
            <a href="{{route('ver-cursos.index')}}" class="btn btn-lavanda mx-3">Ver más cursos</a>
            <button type="submit" class="btn btn-rosa ">Generar ticket</button>
        </form> -->
        <!-- <form action="{{route('ticketsficha.store')}}" method="POST">
             @csrf
            <input type="hidden" name="total" value="{{$total}}">
            <button type="submit" class="btn-form text-center text-white bg-rosa mx-3">Generar ticket sin ficha</a>
         </form> -->
    </section>
</main>

@endsection