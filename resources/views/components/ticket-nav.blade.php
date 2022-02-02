<div>
    <section class="container mt-5">
        <h1 class="text-rosa">Tickets</h1><br>

        <div class="row">
            <div class="col">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('admintickets.index')}}">Todos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sinficha')}}">Sin ficha</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{route('pendientepago')}}">Pendientes de pago</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sinaprobar')}}">Sin aprobar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('pagados')}}">Pagados</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>