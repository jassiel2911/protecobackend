@extends('layouts.app')

@section('content')

<main>
<!-- Muestrea un mensaje cuando se elimina el curso, indicando que se eliminó correctamente. -->
    @if(session('success'))
        <div class="alert bg-lavanda alert-dismissible fade show text-center" role="alert">
            <p class="">Se elimino correctamente</p>
        </div>
    @endif
    <div class="container mx-auto mt-5 mb-5">
       <h2 class="text-rosa text-center">Tu carrito</h2><br>
       <div class="mx-auto text-center">
         @foreach($carts as $cart)
            <div class=" mx-auto w-75">
                <div class="d-flex align-content-center align-items-center justify-content-between">
                    <div class="d-flex align-content-center align-items-center justify-content-between">
                        <img class="img-fluid" src="{{asset('/img/logos/'.$cart->curso->imagen)}}" alt="" width="70">
                        <h5 class="text-start mx-4">{{$cart->curso->nombre}}</h5>
                    </div>
                    <div class="d-flex align-content-center align-items-center justify-content-between"> 
                        <p class="d-none">{{$i = $i+1}}</p>
                        @if(auth()->user()->origin == "Comunidad UNAM")
                        <p class="text-end">$500</p>
                        <!-- Se comprueba si el índice del ciclo está en la posición 3 y en caso de ser verdadero, 
                        no se suma el precio del curso al total, esto se repite para cada tipo de usuario (estudiante, público en general, otro) -->
                            @if($loop->index == 2)
                            
                            @else
                            <p class="d-none">{{$total = $total + 500}}</p>
                            @endif
                        
                        @elseif(auth()->user()->origin == "Alumno externo")
                        <p class="text-end">$600</p>
                            @if($loop->index == 2)
                            
                            @else
                            <p class="d-none">{{$total = $total + 600}}</p>
                            @endif
                        @elseif(auth()->user()->origin == "Publico en general")
                        <p class="text-end">$700</p>
                            @if($loop->index == 2)
                            
                            @else
                            <p class="d-none">{{$total = $total + 700}}</p>
                            @endif
                        
                        @endif
                        <form action="{{route('cart.destroy',$cart->curso_id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input class="mx-3" type="submit" value="Eliminar">
                        </form>
                    </div>
                </div>
            </div><br>
        @endforeach
        <hr>
         <div class="d-flex flex-column align-content-end align-items-end">
            <p><strong>Subtotal: </strong>$ {{$total}}</p>
             <p><strong>Cupón 3x2</strong></p>
             <form action="{{route('ticket.store')}}" method="POST">
                 @csrf
                <input type="hidden" name="total" value="{{$total}}">
                <button type="submit" class="btn-form text-center text-white bg-rosa mx-3">Generar ticket</a>
             </form>
        </div>
       </div>

    </div>
</main>

@endsection