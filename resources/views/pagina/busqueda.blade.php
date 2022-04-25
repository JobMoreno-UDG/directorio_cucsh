@if ($consulta->all() != null && $termino != '')
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <h3 class="text-center">Búsqueda<br/>{{ $termino }}</h3>
            @foreach ($consulta as $item)
                @if ($item->titular != '0')
                    <a href="{{ route('pagina.info', ['edificio' => $item->edificio, 'info' => $item->id]) }}"
                        class="text-decoration-none text-dark">
                        <div class="p-1 m-1">
                            {{ $item->nombre }}
                            <hr style='background-color: #993300'>
                        </div>
                    </a>
                @else
                    <div class="p-1 m-1">
                        {{ $item->edificio }} - {{ $item->piso }} - {{ $item->nombre }}
                        <hr style='background-color: #993300'>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="col-sm-6">
            <p class="text-center w-100">{!! $consulta->links() !!}</p>

        </div>
    </div>
@elseif ($termino == '')
    <span></span>
@else <h3 class="text-center">Búsqueda<br/>{{ $termino }}</h3>
    <h4><b>Sin resultados</b></h4>
@endif